<?php
function array2object($array) {
    
       if (is_array($array)) {
           $obj = new StdClass();
    
           foreach ($array as $key => $val){
               $obj->$key = $val;
           }
       }
       else { $obj = $array; }
    
       return $obj;
   }
    
   function object2array($object) {
       if (is_object($object)) {
           foreach ($object as $key => $value) {
               $array[$key] = $value;
           }
       }
       else {
           $array = $object;
       }
       return $array;
   }
    
   
   function object_to_array_recusive ( $object, $assoc=1, $empty='' ) 
   { 
       $out_arr = array(); 
       $assoc = (!empty($assoc)) ? TRUE : FALSE; 
       
       if (!empty($object)) { 
           
           $arrObj = is_object($object) ? get_object_vars($object) : $object;
       
           $i=0; 
           foreach ($arrObj as $key => $val) { 
               $akey = ($assoc !== FALSE) ? $key : $i; 
                 if (is_array($val) || is_object($val)) { 
                   $out_arr[$key] = (empty($val)) ? $empty : object_to_array_recusive($val); 
                 } 
                 else { 
                   $out_arr[$key] = (empty($val)) ? $empty : (string)$val; 
                 } 
           $i++; 
           }
   
       } 
   
       return $out_arr;
   }


   // example:
    
//    $array = array('foo' => 'bar', 'one' => 'two', 'three' => 'four');
    
//    $obj = array2object($array);
    
//    print $obj->one; // output's "two"
    
//    $arr = object2array($obj);
    
//    print $arr['foo']; // output's bar

?>