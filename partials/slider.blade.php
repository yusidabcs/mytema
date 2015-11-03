    <!-- FLEXSLIDER CONTAINER -->
    <div id="top-slider" class="flexslider-container container">
        <div class="flexslider">
        
            <!-- BEGIN SLIDES -->
            <ul class="slides">
                @foreach(slideshow() as $slide)
                <li>
                    {{HTML::image(slide_image_url($slide->gambar),'slideshow',array('style'=>'max-height:435px;'))}}
                </li>
                @endforeach
            </ul>
            <!-- #END SLIDES -->
            
        </div>
    </div>
   