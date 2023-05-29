<?php

class View{
    function generate($template_view, $content_view, $data = null){
        include 'app/views/'.$template_view;
    }
}