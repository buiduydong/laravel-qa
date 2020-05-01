<?php
 function showErrs($errors,$name) {
    if($errors->has($name)) {
        return $errors->first($name) ;
                    
                
    }

}