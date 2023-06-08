<?php

    function isActive($pattern,$param = null)
    {
        $path = request()->route()->getName();
        if($param==null){
            if($path==$pattern.'.index'||$path==$pattern.'.edit'||$path==$pattern.'.create'||$path==$pattern.'.user'){
                return 'active';
            }
        }else{
            if(url()->full()==url($param)){
                return 'active';
            }
        }

        return;

    }
