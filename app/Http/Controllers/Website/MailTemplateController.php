<?php

namespace App\Http\Controllers\Generic;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use App\Http\Controllers\Generic\MailController;
use App\Business\Generic\Urls\UrlsInterface;
 use Illuminate\Support\Facades\Route;
use Config;
use Crypt;

class MailTemplateController extends Controller
{

    protected $MailController;
    protected $UrlsInterface;

    /**
     * Business logic
     */
    public function __construct(MailController $MailController,UrlsInterface $UrlsInterface)
    {
        $this->MailController = $MailController;
        $this->UrlsInterface = $UrlsInterface;
    }

    /**
     * Send mail after created new role
     * 
     * @param templateDetails
     * @return void
     */
    public function sendTemplateCreatedNewRole($templateDetails){

        $templateId = Config::get('constant.TEMPLATE.CREATE_PROFESSIONAL');

        $urlParam = [
            'template_id' => $templateId,
            'url' => url('login'),
            'template_type' => 'Mail'
        ];
        $urlId = $this->UrlsInterface->insert($urlParam);
        $encryptUrl = url('referance/'.Crypt::encrypt($urlId));

        $to_email = $templateDetails['to_email'];
        $data['mail_data'] = array("toAddress" => $to_email);
        $data['template_data']['email'] = $templateDetails['email'];
        $data['template_data']['link'] = $encryptUrl;
        $data['template_data']['client_name'] = $templateDetails['first_name'].' '.$templateDetails['last_name'];
        $data['template_id'] = $templateId;
        $this->MailController->sendMail($data);
    }

    /**
     * Professional confirmation
     * 
     * @param templateDetails
     * @return void
     */
    public function sendTemplateProfessionalConfirmation($templateDetails){
        $templateId = Config::get('constant.TEMPLATE.CREATE_PROFESSIONAL');

        $urlParam = [
            'template_id' => $templateId,
            'url' => $templateDetails['verfication_url'],
            'template_type' => 'Mail'
        ];
        $urlId = $this->UrlsInterface->insert($urlParam);
        $encryptUrl = url('referance/'.Crypt::encrypt($urlId));

        $to_email = $templateDetails['email'];
        $data['template_data'] = array('first_name' => $templateDetails['first_name']);
        $data['mail_data'] = array("toAddress" => $templateDetails['to_email']);
        $data['email'] = $to_email;
        $data['template_id'] = $templateId; 
        $data['template_data']['verfication_url'] = $encryptUrl;
        $this->MailController->sendMail($data);
    }

    /**
     * Invite for proposal
     * 
     * @param templateDetails
     * @return void
     */
    public function inviteForProposal($templateDetails){
        $templateId = Config::get('constant.TEMPLATE.INVITATION_FOR_PROPOSAL');

        $urlParam = [
            'template_id' => $templateId,
            'url' => $templateDetails['links'],
            'template_type' => 'Mail'
        ];
        $urlId = $this->UrlsInterface->insert($urlParam);
        $encryptUrl = url('referance/'.Crypt::encrypt($urlId));

        $to_email = $templateDetails['email'];
        $data['mail_data'] = array("toAddress" => $to_email);
        $data['template_data']['title'] = $templateDetails['title'];
        $data['template_data']['link'] = $encryptUrl;
        $data['template_data']['user_name'] = $templateDetails['first_name'].' '.$templateDetails['last_name'];
        $data['template_id'] =  $templateId;
        $this->MailController->sendMail($data);
    }

    /**
     * Lead mails
     * 
     * @param templateDetails
     * @return void
     */
    public function leadMail($templateDetails){

        $templateId = Config::get('constant.TEMPLATE.LEAD_NOTIFICATION');

        $urlParam = [
            'template_id' => $templateId,
            'url' => $templateDetails['link'],
            'template_type' => 'Mail'
        ];
        $urlId = $this->UrlsInterface->insert($urlParam);
        $encryptUrl = url('referance/'.Crypt::encrypt($urlId));

        $data['mail_data'] = array("toAddress" => $templateDetails['email'] );
        $data['template_data']['location'] = $templateDetails['address'];
        $data['template_data']['title'] = (!empty($templateDetails['title'])) ? $templateDetails['title']: 'Not specified';
        $data['template_data']['title_id'] = (!empty($templateDetails['id'])) ? $titleKey.$templateDetails['id']: 'Not specified';
        $data['template_data']['desecription'] = (!empty($templateDetails['description'])) ? $templateDetails['description']: 'Not specified';
        $data['template_data']['budget'] = (!empty($templateDetails['budget'])) ? $templateDetails['budget']: 'Not specified';
        $data['template_data']['budget_type'] = (!empty($templateDetails['budget_type'])) ? $templateDetails['budget_type']: ' ';
        $data['template_data']['date'] = (!(isset($templateDetails['date'])) || empty($templateDetails['date']) || $templateDetails['date'] == NULL || $templateDetails['date'] == '0000-00-00') ? 'Not specified' : date('m/d/Y',strtotime($templateDetails['date']));
        $data['template_data']['service_industry'] = (!empty($templateDetails['service_industry'])) ? $templateDetails['service_industry']: 'Not specified';
        $data['template_data']['no_of_professional'] = (!empty($templateDetails['no_of_professional'])) ? $templateDetails['no_of_professional']: 'Not specified';
        $data['template_data']['job_type'] = (!empty($templateDetails['job_type'])) ? $templateDetails['job_type']: 'Not specified';
        $data['template_data']['link'] = $encryptUrl;
        $data['template_id'] = $templateId;
        $this->MailController->sendMail($data);
    }

    /**
     * Job Proposal 
     * 
     * @param templateDetails
     * @return void
     */
    public function proposalMail($templateDetails){

        # url shortner
        $templateId = Config::get('constant.TEMPLATE.PROPOSAL_UPDATE');
        $urlParam = [
            'template_id' => $templateId,
            'url' => $templateDetails['link'],
            'template_type' => 'Mail'
        ];
        $urlId = $this->UrlsInterface->insert($urlParam);
        $encryptUrl = url('referance/'.Crypt::encrypt($urlId));

        # proposal mail
        $to_email = $templateDetails['email'];
        $data['mail_data'] = array("toAddress" => $to_email);
        $data['template_data']['title'] = $templateDetails['title'];
        $data['template_data']['link'] = $encryptUrl;
        $data['template_data']['professional_name'] = $templateDetails['professional_name'];
        $data['template_data']['message'] = nl2br($templateDetails['comment']);
        $data['template_data']['bid'] = (!empty($templateDetails['quotation'])) ? '$'.$templateDetails['quotation'] : 'Not Available' ;
        $data['template_data']['budget'] = (!empty($templateDetails['budget'])) ? '$'.$templateDetails['budget']: 'Not Available';
        $data['template_data']['budget_type'] = (!empty($templateDetails['budget_type'])) ? (($templateDetails['budget_type'] == '/hr') ? '/hour': (($templateDetails['budget_type'] == '/day') ? '/day' : '/project')): ' ';
        $data['template_data']['client_name'] = $templateDetails['client_name'];
        $data['template_id'] = $templateId;
        $this->MailController->sendMail($data);
    }

    /**
     * send reset password link
     * 
     * @param templateDetails
     * @return void
     */
    public function sendResetPassword($templateDetails){

        # url shortner
        $templateId = Config::get('constant.TEMPLATE.RESET_PASSWORD');
        $urlParam = [
            'template_id' => $templateId,
            'url' => $templateDetails['link'],
            'template_type' => 'Mail'
        ];
        $urlId = $this->UrlsInterface->insert($urlParam);
        $encryptUrl = url('referance/'.Crypt::encrypt($urlId));


        $to_email = $templateDetails['email'];
        $data['mail_data'] = array("toAddress" => $to_email);
        $data['template_data']['new_password'] = $encryptUrl;
        $data['template_id'] = $templateId;
        $this->MailController->sendMail($data);
    }

    /**
     * WELCOME PROFESSIONAL BUSINESS
     * 
     * @param templateDetails
     * @return void
     */
    public function sendWelcomeProfessionalMail($templateDetails){

        # url shortner
        $templateId = Config::get('constant.TEMPLATE.WELCOME_PROFESSIONAL_BUSINESS');
        $urlParam = [
            'template_id' => $templateId,
            'url' => $templateDetails['link'],
            'template_type' => 'Mail'
        ];
        $urlId = $this->UrlsInterface->insert($urlParam);
        $encryptUrl = url('referance/'.Crypt::encrypt($urlId));

        $to_email = $templateDetails['email'];
        $data['template_data'] = array('first_name' => $templateDetails['first_name']);
        $data['mail_data'] = array("toAddress" => $to_email);
        $data['template_data']['profile_link'] = $encryptUrl;
        $data['template_id'] = $templateId;
        $this->MailController->sendMail($data);
    }

    /**
     * New Review
     * 
     * @param templateDetails
     * @return void
     */
    public function sendNewReviewMail($templateDetails){

        # url shortner
        $templateId = Config::get('constant.TEMPLATE.NEW_REVIEW');
        $urlParam = [
            'template_id' => $templateId,
            'url' => $templateDetails['link'],
            'template_type' => 'Mail'
        ];
        $urlId = $this->UrlsInterface->insert($urlParam);
        $encryptUrl = url('referance/'.Crypt::encrypt($urlId));

        $data['mail_data'] = array("toAddress" => $templateDetails['email']);
        $data['template_data']['user_name'] = $templateDetails['user_name'];
        $data['template_data']['rating'] = $templateDetails['rating'];
        $data['template_data']['link'] = $encryptUrl;
        $data['template_id'] = $templateId;
        $this->MailController->sendMail($data);
    }

    /**
     * New Review mail for reviewer
     * 
     * @param templateDetails
     * @return void
     */
    public function sendReviewMailConfirmation($templateDetails){

        $templateId = Config::get('constant.TEMPLATE.NEW_REVIEW_SEND');

        $data['mail_data'] = array("toAddress" => $templateDetails['email']);
        $data['template_data']['client_name'] = $templateDetails['clientName'];
        $data['template_data']['professional_name'] = $templateDetails['professionalName'];
        $data['template_id'] = $templateId;
        $this->MailController->sendMail($data);
    }

    /**
     *  Send Mail After earn safety badge
     * 
     * @param templateDetails
     * @return void
     */
    public function sendTopSafetyBadge($templateDetails){

         # url shortner
         $templateId = Config::get('constant.TEMPLATE.EARNED_NEW_BADGE_TOP_SAFETY');
         $urlParam = [
             'template_id' => $templateId,
             'url' => $templateDetails['link'],
             'template_type' => 'Mail'
         ];
         $urlId = $this->UrlsInterface->insert($urlParam);
         $encryptUrl = url('referance/'.Crypt::encrypt($urlId));

        $data['mail_data'] = array("toAddress" => $templateDetails['email']);
        $data['template_data']['professional_name'] = $templateDetails['professionalName'];
        $data['template_data']['badge'] = 'Safety';
        $data['template_data']['link'] = 'https://skyelink.s3.ap-south-1.amazonaws.com/badge/top_safety_badge.png';
        $data['template_data']['profile_link'] = $encryptUrl;
        $data['template_id'] = $templateId;
        $this->MailController->sendMail($data);
    }

    /**
     * Send mail after earn service quality badge
     * 
     * @param templatedetails
     * @return void
     */
    public function sendTopServiceQualityBadge($templateDetails){

        # url shortner
        $templateId = Config::get('constant.TEMPLATE.EARNED_NEW_BADGE_TOP_SERVICE_QUALITY');
        $urlParam = [
            'template_id' => $templateId,
            'url' => $templateDetails['link'],
            'template_type' => 'Mail'
        ];
        $urlId = $this->UrlsInterface->insert($urlParam);
        $encryptUrl = url('referance/'.Crypt::encrypt($urlId));
        
        $data['mail_data'] = array("toAddress" => $templateDetails['email']);
        $data['template_data']['professional_name'] = $templateDetails['professionalName'];
        $data['template_data']['badge'] = 'Service Quality';
        $data['template_data']['link'] = 'https://skyelink.s3.ap-south-1.amazonaws.com/badge/top_service_quality_badge.png';
        $data['template_data']['profile_link'] = $encryptUrl;
        $data['template_id'] = $templateId;
        $this->MailController->sendMail($data);
    }

    /**
     * Send Mail after earn top pro badge
     * 
     * @param templatedetails
     * @return void
     */
    public function sendTopProBadge($templateDetails){

         # url shortner
         $templateId = Config::get('constant.TEMPLATE.EARNED_NEW_BADGE_TOP_PRO');
         $urlParam = [
             'template_id' => $templateId,
             'url' => $templateDetails['link'],
             'template_type' => 'Mail'
         ];
         $urlId = $this->UrlsInterface->insert($urlParam);
         $encryptUrl = url('referance/'.Crypt::encrypt($urlId));

        # badge link
        $badge = asset('website/img/top_service_quality_badge.png');

        $data['mail_data'] = array("toAddress" => $templateDetails['email']);
        $data['template_data']['professional_name'] = $templateDetails['professionalName'];
        $data['template_data']['badge'] = 'Pro';
        $data['template_data']['link'] = 'https://skyelink.s3.ap-south-1.amazonaws.com/badge/top_pro_badge.png';
        $data['template_data']['profile_link'] = $encryptUrl;
        $data['template_id'] = $templateId;
        $this->MailController->sendMail($data);
    }

    /**
     * Send Mail After Client Registration By Review
     * 
     * @param templateDetails
     * @return void
     */
    public function createClientRegistrationMail($templateDetails){
        # url shortner
        $templateId = Config::get('constant.TEMPLATE.NEW_REGISTRATION_CLIENT');

        $data['template_data'] = array('first_name' => $templateDetails['first_name'], 'username' => $templateDetails['email'], 'password' => $templateDetails['password'], 'professional_name' => $templateDetails['professional_name']);
        $data['mail_data'] = array("toAddress" => $templateDetails['email']);
        $data['template_id'] = $templateId;
        $this->MailController->sendMail($data);
    }

    /**
     * Send Earn Badge Top create
     * 
     * @param templateDetails
     * @return void
     */
    public function sendMailTopCreator($templateDetails){
        # url shortner
        $templateId = Config::get('constant.TEMPLATE.EARNED_NEW_BADGE_TOP_CREATOR');

        $data['mail_data'] = array("toAddress" => $templateDetails['email']);
        $data['template_data']['professional_name'] = $templateDetails['professional_name'] ;
        $data['template_data']['badge'] = 'Creator';
        $data['template_data']['link'] = 'https://skyelink.s3.ap-south-1.amazonaws.com/badge/top_creator_badge.png';
        $data['template_id'] = $templateId;
        $this->MailController->sendMail($data);
    }

    /**
     * Invite User
     * 
     * @param templateDetails
     * @return void
     */
    public function sendInviteUser($templateDetails){

        # template
        $templateId = Config::get('constant.TEMPLATE.INVITE_REFERRAL');

        $data['mail_data'] = array("toAddress" => $templateDetails['email']);
        $data['template_data'] = array('referral_url' => $templateDetails['referral_url'], 'user_name'=> $templateDetails['name']);
        $data['template_id'] = $templateId;
        $this->MailController->sendMail($data);
    }

    /**
     * Ask For Review
     * 
     * @param templateDetails
     * @return void
     */
    public function sendAskForReview($templateDetails){

        # template
        $templateId = Config::get('constant.TEMPLATE.ASK_FOR_REVIEW');

        $data['template_data'] = array('referral_url' => $templateDetails['referral_url'], 'user_name'=> $templateDetails['name']);
        $data['mail_data'] = array("toAddress" => $templateDetails['email']);
        $data['template_id'] = $templateId;
        $this->MailController->sendMail($data);
    }

    /**
     * Proposal Accept Mail For Professional
     * 
     * @param templateDetails
     * @return void
     */
    public function sendProposalAcceptMail($templateDetails){

        # template
        $templateId = Config::get('constant.TEMPLATE.PROFESSIONAL_ACCEPT');

        $urlParam = [
            'template_id' => $templateId,
            'url' => $templateDetails['link'],
            'template_type' => 'Mail'
        ];

        $urlId = $this->UrlsInterface->insert($urlParam);
        $encryptUrl = url('referance/'.Crypt::encrypt($urlId));

        $data['mail_data'] = array("toAddress" => $templateDetails['email']);
        $data['template_data']['pro_name'] = $templateDetails['professionalName'];
        $data['template_data']['client_name'] = $templateDetails['clientName'];
        $data['template_data']['title'] = $templateDetails['title'];
        $data['template_data']['price'] = $templateDetails['price'];
        $data['template_data']['link'] = $encryptUrl;
        $data['template_id'] = $templateId;
        $this->MailController->sendMail($data);
    }

    /**
     * Offer Accept Mail For Client
     * 
     * @param templateDetails
     * @return void
     */
    public function sendOfferAcceptMail($templateDetails){

        # template
        $templateId = Config::get('constant.TEMPLATE.OFFER_ACCEPTED');
        $urlParam = [
            'template_id' => $templateId,
            'url' => $templateDetails['link'],
            'template_type' => 'Mail'
        ];
        $urlId = $this->UrlsInterface->insert($urlParam);
        $encryptUrl = url('referance/'.Crypt::encrypt($urlId));

        $data['mail_data'] = array("fromAddress" => $from_email, "toAddress" => $to_email, "ccAddress" => $cc_address);
        $data['template_data']['pro_name'] = $this->session->userdata('name');
        $data['template_data']['client_name'] = $post_detail[0]['porposal_first_name'].' '.$post_detail[0]['porposal_last_name'];
        $data['template_data']['title'] = $post_detail[0]['title'];
        $data['template_data']['price'] = $post_detail[0]['proposal_quotation'];
        $data['template_data']['link'] = $link;
        $data['template_id'] = PROFESSIONAL_ACCEPT;
        $this->MailController->sendMail($data);
    }

    /**
     * Send mail after proposal accepted
     * 
     * @param templateDetails
     * @return void
     */
    public function sendBidAcceptMail($templateDetails){

        # template
        $templateId = Config::get('constant.TEMPLATE.BID_ACCEPTED');

        # url shortner
        $urlParam = [
            'template_id' => $templateId,
            'url' => $templateDetails['link'],
            'template_type' => 'Mail'
        ];
        $urlId = $this->UrlsInterface->insert($urlParam);
        $encryptUrl = url('referance/'.Crypt::encrypt($urlId));
        
        $data['mail_data'] = array("toAddress" => $templateDetails['email']);
        $data['template_data']['client_name'] = $templateDetails['name'];
        $data['template_data']['title'] = $templateDetails['title'];
        $data['template_data']['price'] = $templateDetails['price'];
        $data['template_data']['link'] = $encryptUrl;
        $data['template_id'] = $templateId;
        $this->MailController->sendMail($data);
    }

    /**
     * Send Mail After Mark As Complate
     * 
     * @param templateDetails
     * @return void
     */
    public function sendMarkAsComplateMail($templateDetails){

        # template
        $templateId = Config::get('constant.TEMPLATE.MARK_AS_COMPLETE');

        $data['mail_data'] = array("toAddress" => $templateDetails['email']);
        $data['template_data']['title'] = $templateDetails['title'];
        $data['template_data']['price'] = $templateDetails['price'];
        $data['template_data']['client_name'] = $templateDetails['clientName'];
        $data['template_data']['status'] = $templateDetails['status'];
        $data['template_id'] = $templateId;
        $this->MailController->sendMail($data);
    }

    /**
     * Send Mail For new Recive Offer
     * 
     * @param templateDetails
     * @return void
     */
    public function sendOfferReciveMail($templateDetails){

        # template
        $templateId = Config::get('constant.TEMPLATE.OFFER_RECEIVED');

        # url shortner
        $urlParam = [
            'template_id' => $templateId,
            'url' => $templateDetails['link'],
            'template_type' => 'Mail'
        ];
        $urlId = $this->UrlsInterface->insert($urlParam);
        $encryptUrl = url('referance/'.Crypt::encrypt($urlId));
        
        $data['mail_data'] = array("toAddress" => $templateDetails['email']);
        $data['template_data']['Professional_first_name'] = $templateDetails['Professional_first_name'];
        $data['template_data']['client_name'] = $templateDetails['client_name'];
        $data['template_data']['title'] = $templateDetails['title'];
        $data['template_data']['price'] = $templateDetails['price'];
        $data['template_data']['link'] = $encryptUrl;
        $data['template_id'] = $templateId;
        $this->MailController->sendMail($data);
    }

    /**
     * Send Mail offer confirmation
     * 
     * @param templateDetails
     * @return void
     */
    public function sendOfferSentMail($templateDetails){

        # template
        $templateId = Config::get('constant.TEMPLATE.OFFER_SENT');

        $data['mail_data'] = array("toAddress" => $templateDetails['email']);
        $data['template_data']['professional_name'] = $templateDetails['professionalName'];
        $data['template_id'] = $templateId;
        $this->MailController->sendMail($data);
    }

    /**
     * send mail after invoice
     * 
     * @param templateDetails
     * @return void
     */
    public function sendInvoiceMail($templateDetails){

        # template
        $templateId = Config::get('constant.TEMPLATE.CLIENT_MARKED_COMPLETE');

        # url shortner
        $urlParam = [
            'template_id' => $templateId,
            'url' => $templateDetails['invoice_link'],
            'template_type' => 'Mail'
        ];
        $urlId = $this->UrlsInterface->insert($urlParam);
        $encryptUrlInvoice = url('referance/'.Crypt::encrypt($urlId));

        # url shortner
        $urlParam = [
            'template_id' => $templateId,
            'url' => $templateDetails['review_link'],
            'template_type' => 'Mail'
        ];
        $urlId = $this->UrlsInterface->insert($urlParam);
        $encryptUrlReview = url('referance/'.Crypt::encrypt($urlId));
        
        $data['mail_data'] = array("toAddress" => $templateDetails['email']);
        $data['template_data']['professional_name'] = $templateDetails['professionalName'];
        $data['template_data']['view_invoice_link'] = $encryptUrlInvoice;
        $data['template_data']['leave_review_link'] = $encryptUrlReview;
        $data['template_id'] = $templateId;
        $data["attachments"] = $templateDetails["attachments"];
        $this->MailController->sendHtmlEmail($data);
    }

    /**
     * send invoice reminder mail
     * 
     * @param templateDetails
     * @return void
     */
    public function sendInvoiceRemindMail($templateDetails){
        # template
        $templateId = Config::get('constant.TEMPLATE.INVOICE_REMINDER');

        # url shortner
        $urlParam = [
            'template_id' => $templateId,
            'url' => $templateDetails['link'],
            'template_type' => 'Mail'
        ];
        $urlId = $this->UrlsInterface->insert($urlParam);
        $encryptUrl = url('referance/'.Crypt::encrypt($urlId));
        
        $data['mail_data'] = array("toAddress" => $templateDetails['email']);
        $data['template_data']['clientName'] = $templateDetails['clientName'];
        $data['template_data']['professionalName'] = $templateDetails['professionalName'];
        $data['template_data']['title'] = (!empty($templateDetails['title'])) ? $templateDetails['title']: 'Not Specified';
        $data['template_data']['location'] = (!empty($templateDetails['address'])) ? $templateDetails['address']: 'Not Specified';
        $data['template_data']['title_id'] = (!empty($templateDetails['id']) && isset($templateDetails["titleKey"])) ? $templateDetails["titleKey"].$templateDetails['id']: 'Not Specified';
        $data['template_data']['desecription'] = (!empty($templateDetails['description'])) ? $templateDetails['description']: 'Not Specified';
        $data['template_data']['budget'] = (!empty($templateDetails['amount'])) ? '$'.$templateDetails['amount']: 'Not Specified';
        $data['template_data']['budget_type'] = (!empty($templateDetails['amount'])) ? $templateDetails['budget_type']: ' ';
        $data['template_data']['date'] = (!(isset($templateDetails['date'])) || empty($templateDetails['date']) || $templateDetails['date'] == NULL || $templateDetails['date'] == '0000-00-00') ? 'Not specified' : date('m/d/Y',strtotime($templateDetails['date']));
        $data['template_data']['service_industry'] = (!empty($templateDetails['service_industry'])) ? $templateDetails['service_industry']: 'Not Specified';
        $data['template_data']['no_of_professional'] = (!empty($templateDetails['no_of_professional'])) ? $templateDetails['no_of_professional']: 'Not Specified';
        $data['template_data']['job_type'] = (!empty($templateDetails['job_type'])) ? $templateDetails['job_type']: 'Not Specified';
        $data['template_data']['link'] = $encryptUrl;
        $data['template_id'] = $templateId;
        $this->MailController->sendMail($data);
    }

    /**
     * send profile conplation mail
     * 
     * @param templateDetails
     * @return void
     */
    public function sendCompletionReminderMail($templateDetails){

        # template
        $templateId = Config::get('constant.TEMPLATE.COMPLETION_REMINDER');

        # url shortner
        $urlParam = [
            'template_id' => $templateId,
            'url' => $templateDetails['link'],
            'template_type' => 'Mail'
        ];
        $urlId = $this->UrlsInterface->insert($urlParam);
        $encryptUrl = url('referance/'.Crypt::encrypt($urlId));

        $data['mail_data'] = array("toAddress" => $templateDetails['email']);
        $data['template_data']['link'] = $encryptUrl;
        $data['template_data']['user_name'] = $templateDetails['userName'];
        $data['template_id'] = $templateId;
        $this->MailController->sendMail($data);
    }

    /**
     * Send conversation Reminder
     * 
     * @param templateDetails
     * @return void
     */
    public function sendConversationReminderMail($templateDetails){

        # template
        $templateId = Config::get('constant.TEMPLATE.CONVERSATIONS_REMINDER');

        # url shortner
        $urlParam = [
            'template_id' => $templateId,
            'url' => $templateDetails['link'],
            'template_type' => 'Mail'
        ];
        $urlId = $this->UrlsInterface->insert($urlParam);
        $encryptUrl = url('referance/'.Crypt::encrypt($urlId));

        $data['mail_data'] = array("toAddress" => $templateDetails['email']);
        $data['template_data']['link'] = $encryptUrl;
        $data['template_data']['user_name'] = $templateDetails['userName'];
        $data['template_id'] = $templateId;
        $this->MailController->sendMail($data);
    }

    /**
     * Send project reminder mail
     * 
     * @param templateDetails
     * @return void
     */
    public function sendProjectReminderMail($templateDetails){

        # template
        $templateId = Config::get('constant.TEMPLATE.PROJECT_REMINDER');

        # url shortner
        $urlParam = [
            'template_id' => $templateId,
            'url' => $templateDetails['link_for_open'],
            'template_type' => 'Mail'
        ];
        $urlId = $this->UrlsInterface->insert($urlParam);
        $linkForOpen = url('referance/'.Crypt::encrypt($urlId));

        $urlParam = [
            'template_id' => $templateId,
            'url' => $templateDetails['link_for_archived'],
            'template_type' => 'Mail'
        ];
        $urlId = $this->UrlsInterface->insert($urlParam);
        $linkForArchived = url('referance/'.Crypt::encrypt($urlId));

        $data['mail_data'] = array("toAddress" => $templateDetails['email']);
        $data['template_data']['link_for_open'] = $linkForOpen;
        $data['template_data']['link_for_archived'] = $linkForArchived;
        $data['template_data']['user_name'] = $templateDetails['userName'];
        $data['template_id'] = $templateId;
        $this->MailController->sendMail($data);

    }

    /**
     * Message Recived 
     * 
     * @param templateDetails
     * @return void
     */
    public function sendMessageRecivedMail($templateDetails){

        # template
        $templateId = Config::get('constant.TEMPLATE.PROJECT_REMINDER');

        # url shortner
        $urlParam = [
            'template_id' => $templateId,
            'url' => $templateDetails['link'],
            'template_type' => 'Mail'
        ];
        $urlId = $this->UrlsInterface->insert($urlParam);
        $link = url('referance/'.Crypt::encrypt($urlId));

        $data['mail_data'] = array("toAddress" => $templateDetails['email']);
        $data['template_data']['link'] = $link;
        $data['template_data']['message'] = $templateDetails['message'];
        $data['template_data']['name'] = $templateDetails['userName'];
        $data['template_id'] = $templateId;
        $this->MailController->sendMail($data);
    }

    /**
     * Send Mail after place order
     * 
     * @param templateDetails
     * @return void
     */
    public function sendPlaceOrderMail($templateDetails){

        # template
        $templateId = Config::get('constant.TEMPLATE.PLACED_ORDER');

        # url shortner
        $urlParam = [
            'template_id' => $templateId,
            'url' => $templateDetails['link'],
            'template_type' => 'Mail'
        ];
        $urlId = $this->UrlsInterface->insert($urlParam);
        $link = url('referance/'.Crypt::encrypt($urlId));

        $data['mail_data'] = array("toAddress" => $templateDetails['email']);
        $data['template_data']['title'] = $templateDetails['title']; 
        $data['template_data']['description'] = $templateDetails['description'];
        $data['template_data']['business_name'] = $templateDetails['company_name'];
        $data['template_data']['budget'] = $templateDetails['industry_budget'];
        $data['template_data']['budget_type'] = $templateDetails['budget_type'];
        $data['template_data']['date'] = $templateDetails['flight_date'];
        $data['template_data']['location'] =  $templateDetails['location'];
        $data['template_data']['service'] = $templateDetails['package_desecription'];
        $data['template_data']['post_link'] = $link;
        $data['template_data']['price'] = $templateDetails['price'];
        $data['template_data']['Onsite_contact_name'] =  $templateDetails['name'];
        $data['template_data']['onsite_contact_phone_number'] =  $templateDetails['conatct'];
        $data['template_id'] = $templateId;
        $this->MailController->sendMail($data);
    }

    /**
     * Send Order Recipt Mail
     * 
     * @param templateDetails
     * @return void
     */
    public function sendOrederReciptMail($templateDetails){
        # template
        $templateId = Config::get('constant.TEMPLATE.ORDER_RECEIPT');

        $data['mail_data'] = array("toAddress" => $templateDetails['email']);
        $data['template_data']['order_id'] = $templateDetails['order_id'];
        $data['template_data']['amount'] = $templateDetails['amount'];
        $data['template_data']['packagename'] = $templateDetails['package_name'];
        $data['template_data']['packagedesecription'] = $templateDetails['package_desecription'];
        $data['template_data']['card_type'] = $templateDetails['card_type'];
        $data['template_data']['four_digits'] = $templateDetails['four_digit'];
        $data['template_data']['client_name'] = $templateDetails['clientName'];
        $data['template_id'] = $templateId;
        $this->MailController->sendMail($data);
    }

    /**
     * Send New Request Mail
     * 
     * @param templateDetails
     * @return void
     */
    public function sendNewRequestMail($templateDetails){
        # template
        $templateId = Config::get('constant.TEMPLATE.NEW_REQUEST_QUOTE');

        $data['mail_data'] = array("toAddress" => $templateDetails['toEmail']);
        $data['template_data']['client_name'] = $templateDetails['client_name'];
        $data['template_data']['job_title'] = $templateDetails['job_title'];
        $data['template_data']['city'] = $templateDetails['city'];
        $data['template_data']['state'] = $templateDetails['state'];
        $data['template_data']['country'] = $templateDetails['country'];
        $data['template_data']['address'] = $templateDetails['address'];
        $data['template_data']['business_name'] = $templateDetails['business_name'];
        $data['template_data']['email'] =  $templateDetails['email'];
        $data['template_data']['ipaddress'] = $templateDetails['ipaddress'];
        $data['template_data']['contact'] = $templateDetails['contact'];
        $data['template_data']['details'] = $templateDetails['details'];
        $data['template_id'] = $templateId;
        $this->MailController->sendMail($data);
    }

    /**
     * Send Payment Confirmation
     * 
     * @param templateDetails
     * @return void
     */
    public function sendPaymentConfirmationMail($templateDetails){

        # template
        $templateId = Config::get('constant.TEMPLATE.PAYMENT_CONFIRMATION');

        $data['mail_data'] = array("toAddress" => $templateDetails['email']);
        $data['template_data']['invoice_id'] = $templateDetails['id'];
        $data['template_data']['amount'] = $templateDetails['amount'];
        $data['template_data']['card_type'] = $templateDetails['card_type'];
        $data['template_data']['four_digits'] = $templateDetails['four_digits'];
        $data['template_data']['client_name'] = $templateDetails['client_name'];
        $data['template_data']['pilot_name'] = $templateDetails['pilot_name'];
        $data['template_data']['post_name'] = $templateDetails['post_name'];
        $data['template_id'] = $templateId;
        $this->MailController->sendMail($data);
    }

    /**
     * Create Client Account Mail
     * 
     * @param templateDetail
     * @return void
     */
    public function CreateClientAccount($templateDetails){

        # template
        $templateId = Config::get('constant.TEMPLATE.CREATE_CLIENT');
        $urlParam = [
            'template_id' => $templateId,
            'url' => config('app.url').'/login',
            'template_type' => 'Mail'
        ];
        $urlId = $this->UrlsInterface->insert($urlParam);
        $encryptUrl = config('app.url').'/referance/'.Crypt::encrypt($urlId);

        $data['mail_data'] = array("toAddress" => $templateDetails['email']);
        $data['template_data']['password'] = $templateDetails['password'];
        $data['template_data']['email'] = $templateDetails['email'];
        $data['template_data']['link'] = $encryptUrl;
        $data['template_data']['client_name'] = $templateDetails['client_name'];
        $data['template_id'] = $templateId;
        $this->MailController->sendMail($data);
    }

    /**
     * Create Client Account who have alredy professional account
     * 
     * @param templateDetail
     * @return void
     */
    public function sendCreateClientAlreadyAccountMail($templateDetails){
        # template
        $templateId = Config::get('constant.TEMPLATE.CREATE_CLIENT_ALREADY_ACCOUNT');
        $urlParam = [
            'template_id' => $templateId,
            'url' => config('app.url').'/login',
            'template_type' => 'Mail'
        ];
        $urlId = $this->UrlsInterface->insert($urlParam);
        $encryptUrl = config('app.url').'/referance/'.Crypt::encrypt($urlId);

        $data['mail_data'] = array("toAddress" => $templateDetails['email']);
        $data['template_data']['email'] = $templateDetails['email'];
        $data['template_data']['link'] = $encryptUrl;
        $data['template_data']['client_name'] = $templateDetails['client_name'];
        $data['template_id'] = $templateId;
        $this->MailController->sendMail($data);
    }
    //to Professional
    public function sendDataUploadAcceptMail($templateDetails){
        # template
        $templateId = Config::get('constant.TEMPLATE.DATA_UPLOAD_ACCEPTED');

        $data['mail_data'] = array("toAddress" => $templateDetails['email']);
        $data['template_data']['email'] = $templateDetails['email'];
        $data['template_data']['post_title'] = $templateDetails['post_title'];
        $data['template_data']['post_id'] = $templateDetails['post_id'];
        $data['template_id'] = $templateId;
        $this->MailController->sendMail($data);
    }
    //to Professional
    public function sendDataUploadRejectMail($templateDetails){
        # template
        $templateId = Config::get('constant.TEMPLATE.DATA_UPLOAD_REJECTED');

        $data['mail_data'] = array("toAddress" => $templateDetails['email']);
        $data['template_data']['email'] = $templateDetails['email'];
        $data['template_data']['post_title'] = $templateDetails['post_title'];
        $data['template_data']['post_id'] = $templateDetails['post_id'];
        $data['template_id'] = $templateId;
        $this->MailController->sendMail($data);
    }
    //to Admin
    public function sendDataUploadCompleteMail($templateDetails){
        # template
        $templateId = Config::get('constant.TEMPLATE.DATA_UPLOAD_COMPLETED');

        $data['mail_data'] = array("toAddress" => $templateDetails['email']);
        $data['template_data']['email'] = $templateDetails['email'];
        $data['template_data']['professional_name'] = $templateDetails['professional_name'];
        $data['template_data']['post_title'] = $templateDetails['post_title'];
        $data['template_data']['post_id'] = $templateDetails['post_id'];
        $data['template_id'] = $templateId;
        $this->MailController->sendMail($data);
    }
    public function sendDataUploadAutoAcceptMail($templateDetails){
        # template
        $templateId = Config::get('constant.TEMPLATE.DATA_UPLOAD_AUTO_AACEPT');

        $data['mail_data'] = array("toAddress" => $templateDetails['email']);
        $data['template_data']['email'] = $templateDetails['email'];
        // $data['template_data']['link'] = $templateDetails['link'];
        // $data['template_data']['client_name'] = $templateDetails['client_name'];
        $data['template_id'] = $templateId;
        $this->MailController->sendMail($data);
    }
}