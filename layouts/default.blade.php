<!DOCTYPE html>
<html lang="en">
    <head>
        {{ Theme::partial('seostuff') }}  
        <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>
        {{ Theme::partial('defaultcss') }}  
        {{ Theme::asset()->styles() }}  
    </head>
    <body>
        {{ Theme::partial('header') }}  
        <div class="container">
            {{ Theme::place('content') }}  
        </div>
        {{ Theme::partial('footer') }}  
        {{ Theme::partial('defaultjs') }}  
        {{ Theme::partial('analytic') }}  
    </body>
</html>