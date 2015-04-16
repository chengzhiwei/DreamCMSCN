<?php

namespace Content\Widget;

class CateWidget extends \Think\Controller
{

    public function allcate()
    {
        
        $Category = DD('Category');
        $catelist = $Category->select();
        Vendor('Unlimitedclass.Unlimitedclass', '', '.class.php');
        $unlimitedclass = new \Unlimitedclass();
        $Category_arr = $unlimitedclass->cateresult($catelist);
        $this->assign( 'Category_arr',$Category_arr);
        $this->display('Widget:allcate');
    }

}
