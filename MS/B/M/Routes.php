<?php
//dd(\MS\Core\Helper\Comman::loadCustom(['locationOfFile'=>'MAS.R'],'b'));
Route::prefix('MAS')->group(function () {
    \MS\Core\Helper\Comman::loadCustom(['locationOfFile'=>'MAS.R'],'b');
});

Route::prefix('HM')->group(function () {
    \MS\Core\Helper\Comman::loadCustom(['locationOfFile'=>'HM.R'],'b');
});


