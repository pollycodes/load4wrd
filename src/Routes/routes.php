<?php

Route::get('/load/hello', function(){
	echo 'Hello from the load4wrd package!';
});

Route::get('/load/product-codes/{net?}', 'PollyCodes\Load4wrd\Loading@Product_Codes');