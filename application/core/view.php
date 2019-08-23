<?php

class View
{
    // $content_view - виды, отображающие контент страниц;
    // $template_view - общий для всех страниц шаблон;
    // $data - массив, содержащий эл-ты контента страницы.

    function generate($content_view, $template_view, $data = null)
    {
        include 'application/views/'.$template_view;
    }
}
