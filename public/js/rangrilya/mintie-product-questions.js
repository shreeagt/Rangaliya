/**
 * Product Question
 *
 * @package mintie
 */

'use strict';

(function ($) {
	$(document).ready(function () {
		questionFormHandler();
		replyHandler();
		getProductQuestions();

		$(document.body).on('mintie_product_question_added', function () {
			replyHandler();
		});

		$(document.body).on('mintie_product_question_child_added mintie_question_reply_cancelled', function (e, question_id) {
			$('.question-reply--' + question_id).removeClass('is-replying');
			$('.cancel-reply--' + question_id).removeClass('show');
			$('.question-form-wrapper-' + question_id).remove();
		});
	});

	function getProductQuestions() {
		var $productQuestionWrap = $('#mintie-wc-question'),
		    $questionContainer = $('.question-list-container', $productQuestionWrap),
		    $form = $('.question-search-form', $productQuestionWrap),
		    $questionList = $('.question-list', $productQuestionWrap),
		    $questionToolbar = $('.question-toolbar', $productQuestionWrap);

		$form.on('submit', function (e) {
			e.preventDefault();

			var formData = $form.serialize();

			$.ajax({
				url: mintie_product_questions.ajaxurl,
				data: formData,
				success: function success(response) {
					var $pagination = $('.question-navigation', $productQuestionWrap);

					if (response.response) {
						$questionList.html(response.response);
					} else {
						$questionList.html($('<li class="question question-no-found"/>').text(response.no_found));
					}

					if (response.pagination) {
						var $newPagenation = $(response.pagination) ? $(response.pagination) : '';
						if ($pagination.length) {
							$pagination.replaceWith($newPagenation);
						} else {
							$newPagenation ? $newPagenation.insertAfter($questionList) : '';
						}
					} else {
						$pagination.remove();
					}

					$('.question-count', $questionToolbar).html(response.count);
					$('.question-text', $questionToolbar).html(response.text);
					questionNavHandler();

					$(document.body).trigger('mintie_product_question_loaded', response);
				},
				beforeSend: function beforeSend() {
					var headerHeight = 0,
					    offset = $questionToolbar.offset().top;

					if ($(document.body).hasClass('header-sticky-enable')) {
						headerHeight = $('#page-header').outerHeight();
					}

					offset -= headerHeight;
					$('html, body').animate({ scrollTop: offset }, 800);
					$questionContainer.addClass('block-updating');
				},
				complete: function complete() {
					$questionContainer.removeClass('block-updating');
				}
			});

			return false;
		});

		questionNavHandler();

		function questionNavHandler() {
			$('.question-navigation', $productQuestionWrap).on('click', 'a', function (e) {
				e.preventDefault();
				e.stopPropagation();

				var href = $(this).attr('href');
				var page = getUrlParameter(href, 'current_page');

				$form.find('input[name="current_page"]').val(page);
				$form.trigger('submit');
			});
		}
	}

	function questionFormHandler() {
		var $productQuestion = $('#mintie-wc-question'),
		    $noreViews = $('.woocommerce-noreviews', $productQuestion),
		    $questionContainer = $('.question-list-container', $productQuestion),
		    $questionList = $('.question-list', $productQuestion);

		$(document.body).on('click', '.question-form .submit', function (e) {
			var $btn = $(this),
			    $form = $btn.closest('.question-form'),
			    $question = $('[name=question]', $form),
			    author = $('input[name=q-author]', $form).val(),
			    email = $('input[name=q-email]', $form).val(),
			    question = $question.val(),
			    postID = parseInt($('input[name=post_id]', $form).val()),
			    questionParentID = parseInt($('input[name=question_parent_id]', $form).val()),
			    questionCount = parseInt($('.question-count', $questionContainer).html());

			var data = {
				action: 'mintie_add_comment',
				author: author,
				email: email,
				question: question,
				post_id: postID,
				question_parent_id: questionParentID
			};

			if ($btn.hasClass('block-updating')) {
				return;
			}

			$btn.addClass('block-updating');
			$questionContainer.addClass('block-updating');

			$.post(mintie_product_questions.ajaxurl, data, function (response) {
				if (response.success) {
					if (questionParentID) {
						var $questionChildList = $('.children', '#li-comment-' + questionParentID);
						if ($questionChildList.length) {
							$questionChildList.prepend(response.data.response);
						} else {
							$questionChildList = $('<ol class="children" />');
							$questionChildList.appendTo('#li-comment-' + questionParentID).html(response.data.response);
						}

						$(document.body).trigger('mintie_product_question_child_added', [questionParentID]);
					} else {
						// Increasing comment count if it is not children comment.
						questionCount = questionCount + 1;

						// Remove no questions text.
						if ($noreViews.length) {
							$noreViews.remove();
						}

						$questionList.prepend(response.data.response);
					}

					var questionText = questionCount === 1 ? response.data.single_text : response.data.plural_text;

					$('.question-count', $questionContainer).html(questionCount);
					$('.question-text', $questionContainer).html(questionText);

					$question.val('');
					$(document.body).trigger('mintie_product_question_added', [response.data, true]);
				} else {
					$('<div/>').text(response.data).prependTo('.question-form-message-box').delay(4000).fadeOut(500, function () {
						$(this).remove();
					});
				}

				$btn.removeClass('block-updating');
				$questionContainer.removeClass('block-updating');
			});

			$form.on('submit', function (e) {
				e.preventDefault();
			});

			e.preventDefault();
		});
	}

	function replyHandler() {
		$(document.body).on('click', '.question-reply', function (e) {
			e.preventDefault();

			var $el = $(this),
			    post_id = $el.data('post-id'),
			    question_id = $el.data('question-id'),
			    $parentQuestion = $('#comment-' + question_id),
			    $formWrapper = $('.question-form-wrapper');

			if ($el.hasClass('is-replying')) {
				return;
			}

			$el.addClass('is-replying').siblings('.cancel-reply').addClass('show');

			$formWrapper.clone().insertAfter($parentQuestion).show().addClass('question-form-wrapper-clone question-form-wrapper-' + question_id).removeClass('question-form-wrapper').find('input[name="question_parent_id"]').val(question_id);

			$('label[for=question]', '.question-form-wrapper-clone').remove();
		});

		$(document.body).on('click', '.cancel-reply', function (e) {
			e.preventDefault();

			var question_id = $(this).data('question-id');

			$(document.body).trigger('mintie_question_reply_cancelled', [question_id]);
		});
	}

	function getUrlParameter(link, name) {
		name = name.replace(/[\[]/, '\\[').replace(/[\]]/, '\\]');

		var regex = new RegExp('[\\?&]' + name + '=([^&#]*)');
		var results = regex.exec(link);

		return results === null ? '' : decodeURIComponent(results[1].replace(/\+/g, ' '));
	}
})(jQuery);