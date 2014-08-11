/**
 * Author: gnomjogson
 * Date: 16.04.13
 * Created: 20:57
 **/
(function(window){

    Controller.prototype.constructor = Controller;
    Controller.prototype = {}

    function Controller(){

        var $content = $('#content');

        $(window).scroll(function(){

            var scrollTop = $(window).scrollTop();
            var speed = $content.data('speed')*(scrollTop/8000);
            var scrollTop = $(window).scrollTop();
            if(scrollTop > 800 ) scrollTop = 800;
            var yPos = -(scrollTop * speed);
            console.log("yPos -> " + yPos);
            var coords = '50% '+ yPos + 'px';
            $content.css("background-position", coords);

        })
    }

    window.Controller = Controller;

}(window));

