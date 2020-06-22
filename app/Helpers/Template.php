<?php
namespace App\Helpers;
use Config;
    
class Template{
    public static function showItemHistory($time, $by = null){
        $xhtml = '';
        if($by == null){
            $xhtml = sprintf('<p>%s </p>',
                             date(Config::get('myconf.format.short_time'), strtotime($time)));
        }else{
        $xhtml = sprintf('<p><i class="fa fa-user"></i> %s </p>
                        <p><i class="fa fa-clock-o"></i> %s </p>',
                        $by, date(Config::get('myconf.format.short_time'), strtotime($time)));
        }
        return $xhtml;
    }

    public static function showItemStatus($controllerName, $id, $statusValue){
        $xhtml = '';
        $tmpStatus = Config::get('myconf.template.status');
        $statusValue = array_key_exists($statusValue, $tmpStatus) ? $statusValue : 'default';
        $currentStatus = $tmpStatus[$statusValue];
        $link = route($controllerName . '/change-status-backend', ['status' => $statusValue, 'id' => $id,]);
        $xhtml = sprintf('<a href="%s" type="button" class="btn btn-round %s">%s</a>', $link, $currentStatus['class'], $currentStatus['name']);
       
        
        return $xhtml;
    } 

    public static function showItemStatusApplied($controllerName, $id, $statusValue){
        $xhtml = '';
        $tmpStatus = Config::get('myconf.template.status_applied');
        $statusValue = array_key_exists($statusValue, $tmpStatus) ? $statusValue : 'default';
        $currentStatus = $tmpStatus[$statusValue];
        $link = route($controllerName . '/change-status', ['status' => $statusValue, 'id' => $id,]);
        $xhtml = $xhtml = sprintf('<a href="%s" type="button" class="btn btn-round">%s</a>', $link, $currentStatus['name']);
        return $xhtml;
    } 

    public static function showButtonAction($controllerName, $id){
        $xhtml = '';
        $tmpButton = Config::get('myconf.template.button', 'default');
        $buttonInArea = Config::get('myconf.config.button', 'default');
        $controllerName = (array_key_exists($controllerName, $buttonInArea) ? $controllerName : 'default');
        $listButton = $buttonInArea[$controllerName];
        $xhtml = '<div class="zvn-box-btn-filter">';
        foreach($listButton as $btn){
            $currentButton = $tmpButton[$btn];
            $link = route($controllerName . $currentButton['route-name'], ['id' =>  $id]);
            $xhtml .= sprintf('<a href="%s" type="button" class="btn btn-icon %s" data-toggle="tooltip" data-placement="top" data-original-title="%s">
                                    <i class="fa %s"></i>
                                </a>', $link, $currentButton['class'], $currentButton['title'], $currentButton['icon']);
        }        
        $xhtml .= '</div>';
        return $xhtml;
    } 

    public static function showButtonFilter($controllerName, $itemsStatusCount, $currentFilter, $paramsSearch){
        $xhtml = ''; 
        $tmpStatus = Config::get('myconf.template.status');
        if(count($itemsStatusCount) > 0){
            array_unshift($itemsStatusCount, [
                'count' => array_sum(array_column($itemsStatusCount, 'count')),
                'status' => 'all'
            ]);
            foreach($itemsStatusCount as $item){
                $statusValue = $item['status'];
                $statusValue = array_key_exists($statusValue, $tmpStatus) ? $statusValue : 'default';
                $currentTemplateStatus = $tmpStatus[$statusValue];
                $link = route($controllerName. '/manager') . '?filter_status=' . $statusValue;
                if($paramsSearch['value'] != ''){
                    $link .= "&search_field=" . $paramsSearch['field'] . "&search_value=" . $paramsSearch['value'];
                }
                $class = ($currentFilter == $statusValue) ? 'btn-danger' : 'btn-info';
                $xhtml .= sprintf('<a href="%s" type="button" class="btn %s"> %s <span class="badge bg-white">%s</span></a>',
                $link, $class, $currentTemplateStatus['name'], $item['count']);
            }            
        }  
        return $xhtml;
    } 

    public static function showAreaSearch($controllerName, $paramsSearch){
        $xhtml = '';
        $tmpField = Config::get('myconf.template.search');
        $fieldInController = Config::get('myconf.config.search');
        $controllerName = (array_key_exists($controllerName, $fieldInController)) ? $controllerName : 'default';
        $xhtmlField = null;
        foreach($fieldInController[$controllerName] as $field){
            $xhtmlField .= sprintf('<li><a href="#" class="select-field" data-field="%s">%s</a></li>', $field, $tmpField[$field]['name']);
        }
        $searchField = (in_array($paramsSearch['field'], $fieldInController[$controllerName])) ? $paramsSearch['field'] : 'all';
        $xhtml = sprintf('<div class="input-group">
                            <div class="input-group-btn">
                                <button type="button" class="btn btn-default dropdown-toggle btn-active-field" data-toggle="dropdown" aria-expanded="false"> %s <span class="caret"></span> </button>
                                <ul class="dropdown-menu dropdown-menu-right" role="menu">%s</ul>
                            </div>
                            <input type="text" name="search_value" value="%s" class="form-control">
                            <input type="hidden" name="search_field" value="%s">
                            <span class="input-group-btn">
                                <button id="btn-clear-search" type="button" class="btn btn-success" style="margin-right: 0px">Xóa tìm kiếm</button>
                                <button id="btn-search" type="button" class="btn btn-primary">Tìm kiếm</button>
                            </span>                           
                        </div>', $tmpField[$searchField]['name'], $xhtmlField, $paramsSearch['value'], $searchField);
        return $xhtml;
    }

    public static function showItemThumb($controllerName, $thumbName, $thumbAlt){
        $xhtml = '';
        $xhtml = sprintf('<img src="%s" alt="%s" class="zvn-thumb">', asset("images/$controllerName/$thumbName"), $thumbAlt);
        return $xhtml;
    }

    public static function showItemSelect($controllerName, $id, $displayValue, $fieldName){
        $tmpDisplay = Config::get('myconf.template.' . $fieldName);
        $link = route($controllerName . '/' . $fieldName, [$fieldName => 'value_new', 'id' => $id]);
        $xhtml = sprintf('<select name="select_change_attr" data-url="%s" class="form-control">', $link);
        foreach($tmpDisplay as $key => $value){
            $xhtmlSelected = '';
            if($key == $displayValue) $xhtmlSelected = 'selected="selected"';
            $xhtml .= sprintf('<option value="%s" %s>%s</option>', $key, $xhtmlSelected, $value['name']);
        }
        $xhtml .= '</select>';
        return $xhtml; 
    }
}