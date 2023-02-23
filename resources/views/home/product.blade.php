<section class="product_section layout_padding" id="product">
    <div class="container">
       <div class="heading_container heading_center">
          <h2>
             Our <span>products</span>
          </h2>
       </div>
       <div class="row">
         @foreach ($product as $products)
            
         <div class="col-sm-6 col-md-4 col-lg-4">
            <div class="box">
               <div class="option_container">
                  <div class="options">
                     <a href="{{route('productDetails',$products->id)}}" class="option1">
                        Details
                     </a>

                     <form action="{{route('addCart',$products->id)}}" method="Post">
                        @csrf
                        <div class="row">
                           <div class="col-md-4">
                              <input type="number" name="quantity" value="1" min="1" style="80px">

                           </div>
                           <div class="col-md-4">
                              <input type="submit" value="Add To Cart">

                           </div>
                        </div>
                     </form>

                  </div>
               </div>
               <div class="img-box">
                  <img src="productimage/{{$products->image}}" alt="">
               </div>
               <div class="detail-box">
                  <h5>
                     {{$products->Title}}
                  </h5>
                  <h6>
                    {{$products->price}} <span>&#2547;</span> 
                  </h6>
               </div>
            </div>
         </div>
         
         @endforeach
         <span style="padding-top: 20px ">
            {!!$product->withQueryString()->links('pagination::bootstrap-4')!!}
         </span>
      </div>
      
   </div>
 </section>