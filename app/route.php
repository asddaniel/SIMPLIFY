<?php
use App\routes\Route;



Route::get("/", function(){
    echo 'routing';   
});

Route::get("/acid/{id}", function($id){
    echo 'routing numero '.$id;   
});