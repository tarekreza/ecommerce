<section class="subscribe_section">
    <div class="container-fuild">
       <div class="box">
          <div class="row">
             <div class="col-md-6 offset-md-3">
                <div class="subscribe_form ">
                   <div class="heading_container heading_center">
                      <h3>Drop Yours Review Here</h3>
                   </div>
                   
                   <form action="{{route('review')}}" method="post">
                     @csrf
                      <input type="text" name='review' placeholder="Enter your Thoughts">
                      <button type="submit">
                      Post
                      </button>
                   </form>
                </div>
             </div>
          </div>
       </div>
    </div>
 </section>