<?php

class ProductController
{
    public function actionView($id)
    {
        require_once (ROOT.'/view/product/view.php');
    }
}