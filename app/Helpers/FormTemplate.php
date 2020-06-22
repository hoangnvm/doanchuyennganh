<?php
namespace App\Helpers;
use Config;
    
class FormTemplate{

    public static function show($elements){
        $xhtml = null;
        foreach($elements as $element){
            $xhtml .= self::formGroup($element);
        }
        return $xhtml;
    }

    public static function formGroup($element, $params = null){
        $xhtml = null;
        $type = (isset($element['type'])) ? $element['type'] : 'input';
        switch ($type) {
            case "input":
                $xhtml .= sprintf('<div class="form-group"> %s <div class="col-md-6 col-sm-6 col-xs-12"> %s </div></div>',
                $element['label'], $element['element']);
                break;
            
            case 'btn-submit':
                $xhtml .= sprintf('<div class="ln_solid"></div><div class="form-group"><div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">%s</div></div>', $element['element']);
                break;
            case 'logo':
                $xhtml .= sprintf('<div class="form-group">%s<div class="col-md-6 col-sm-6 col-xs-12">%s<p style="margin-top: 50px;">%s</p></div> </div>',
                                    $element['label'], $element['element'], $element['logo']);
                break;
            case 'cover_image':
                $xhtml .= sprintf('<div class="form-group">%s<div class="col-md-6 col-sm-6 col-xs-12">%s<p style="margin-top: 50px;">%s</p></div> </div>',
                                    $element['label'], $element['element'], $element['cover_image']);
                break;
            case 'avatar':
                $xhtml .= sprintf('<div class="form-group">%s<div class="col-md-6 col-sm-6 col-xs-12">%s<p style="margin-top: 50px;">%s</p></div> </div>',
                                    $element['label'], $element['element'], $element['avatar']);                        
                break;
            case 'cv':
                    $xhtml .= sprintf('<div class="form-group">%s<div class="col-md-6 col-sm-6 col-xs-12">%s<p style="margin-top: 50px;">%s</p></div> </div>',
                                        $element['label'], $element['element'], $element['cv']);
                    break;
        }

        return $xhtml;
    }

    public static function showFrontend($elements){
        $xhtml = '<div class="row">';
        foreach($elements as $element){
            $xhtml .= self::formGroupFrontend($element);
        }
        $xhtml .= '</div>';
        return $xhtml;
    }

    public static function formGroupFrontend($element, $params = null){
        $xhtml = null;
        $type = (isset($element['type'])) ? $element['type'] : 'input';
        switch ($type) {
            case "input":
                $xhtml .= sprintf('<div class="%s">
                                        <span class="pf-title">%s</span>
                                        <div class="pf-field"> %s </div>
                                    </div>',$element['class'],
                $element['label'], $element['element']);
                break;
            case 'btn-submit':
                $xhtml .= sprintf('<div class="%s"><button type="submit">%s</button></div>', $element['class'], $element['element']);
                break;
            case 'avatar':
                $xhtml .= sprintf('<div class="%s"><span class="pf-title">%s</span><div><span>%s</span><div">%s</div></div>',
                                    $element['class'], $element['label'], $element['avatar'], $element['element']);
                break;
            case 'logo':
                $xhtml .= sprintf('<div class="%s"><span class="pf-title">%s</span><div><span>%s</span><div">%s</div></div>',
                                    $element['class'], $element['label'], $element['logo'], $element['element']);
                break;
            case 'cover_image':
                $xhtml .= sprintf('<div class="%s"><span class="pf-title">%s</span><div><span>%s</span><div">%s</div></div>',
                                    $element['class'], $element['label'], $element['cover_image'], $element['element']);
                break;

                    
        }
        
        return $xhtml;
    }

    
}