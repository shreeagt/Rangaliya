@include('layouts.headerrang')
<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <style>
      a{
        color: #000
      }
      .small-img-col{
        flex-basis: 24%;
      }
.butn{
  width: 140px;
  height: 40px;
  border-radius: 12px;
  border: none;
  background-color: rgb(255, 208, 0);
  display: flex;
  align-items: center;
  justify-content: center;
  cursor: pointer;
  transition-duration: .5s;
  overflow: hidden;
  box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.103);
  position: relative;
}
.CartBtn {
  width: 140px;
  height: 40px;
  border-radius: 12px;
  border: none;
  background-color: rgb(255, 208, 0);
  display: flex;
  align-items: center;
  justify-content: center;
  cursor: pointer;
  transition-duration: .5s;
  overflow: hidden;
  box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.103);
  position: relative;
}
.IconContainer {
  position: absolute;
  left: -50px;
  width: 30px;
  height: 30px;
  background-color: transparent;
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  overflow: hidden;
  z-index: 2;
  transition-duration: .5s;
}
.text {
  height: 100%;
  width: fit-content;
  display: flex;
  align-items: center;
  justify-content: center;
  color: rgb(17, 17, 17);
  z-index: 1;
  transition-duration: .5s;
  font-size: 1.04em;
  font-weight: 600;
}
.CartBtn:hover .IconContainer {
  transform: translateX(58px);
  border-radius: 40px;
  transition-duration: .5s;
}
.CartBtn:hover .text {
  transform: translate(10px,0px);
  transition-duration: .5s;
}
.CartBtn:active {
  transform: scale(0.95);
  transition-duration: .5s;
}
</style>
<body>
<section id="container product">
    <div class="row mt-5 justify-content-around">
        <div class="col-lg-5 col-md-12 col-12">
            <img class="img-fluid w-100 pb-2 pt-3" src="img/new1/IMG_7101.jpg" alt="">
            <div class="small-img-group d-flex justify-content-between">
                <div class="small-img-col">
                    <img class="small-img" src="img/new1/IMG_7101.jpg" width="100%" alt="">
                </div>
                <div class="small-img-col">
                    <img class="small-img" src="img/new1/IMG_7103.jpg" width="100%" alt="">
                </div>
                <div class="small-img-col">
                    <img class="small-img" src="img/new1/IMG_7104.jpg" width="100%" alt="">
                </div>
                <div class="small-img-col">
                    <img class="small-img" src="img/new1/IMG_7101.jpg" width="100%" alt="">
                </div>
            </div>
        </div>
        <div class="col-lg-5 col-md-12 col-12">
            <div class="content">
                <h2 class="product-name py-3">Nike Max 90</h2>
                <h4 class="product-price">Rs. 9000</h4>
                <input class="mt-3" type="number" value="1" min="1">
                <button class="CartBtn mt-3">
                    <span class="IconContainer"> 
                      <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512" fill="rgb(17, 17, 17)" class="cart"><path d="M0 24C0 10.7 10.7 0 24 0H69.5c22 0 41.5 12.8 50.6 32h411c26.3 0 45.5 25 38.6 50.4l-41 152.3c-8.5 31.4-37 53.3-69.5 53.3H170.7l5.4 28.5c2.2 11.3 12.1 19.5 23.6 19.5H488c13.3 0 24 10.7 24 24s-10.7 24-24 24H199.7c-34.6 0-64.3-24.6-70.7-58.5L77.4 54.5c-.7-3.8-4-6.5-7.9-6.5H24C10.7 48 0 37.3 0 24zM128 464a48 48 0 1 1 96 0 48 48 0 1 1 -96 0zm336-48a48 48 0 1 1 0 96 48 48 0 1 1 0-96z"></path></svg>
                    </span>
                    <p class="text m-0">Add to Cart</p>
                  </button>
                <h4 class="mt-3 mb-3">Product Details:</h4>
                <p class="m-2">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Architecto, eos, animi officiis laboriosam inventore quas est impedit ullam nemo quidem eum dolor sit placeat tempora eius deleniti debitis nobis fugit hic incidunt necessitatibus et accusamus rem quae. Sequi, eum quasi unde rerum quis animi at corrupti, neque error doloremque tempore?</p>
            </div>
        </div>
    </div>
</section>
</body>