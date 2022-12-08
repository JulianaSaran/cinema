<?php

use Juliana\Cinema\Framework\Session\FlashMessage;

$flash = FlashMessage::fromSession();

?>

@include('header')
<div id="main-container" class="container-fluid">
    <h1>Conta do usuário</h1>
</div>
@include('footer')