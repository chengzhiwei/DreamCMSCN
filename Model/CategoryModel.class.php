<?php

namespace Model;

class CategoryModel extends \Think\Model\AdvModel
{

    protected $_validate = array(
        array('title', 'require', '用户名不能为空'),
    );

    public function addcate($data = array())
    {
        if (!$data)
        {
            $data = I('post.');
        }
        if ($this->create($data))
        {
            if ($this->add())
            {
                return true;
            } else
            {
                return false;
            }
        } else
        {
            return false;
        }
    }

    public function selectall($lid='')
    {
        $condition = array();
        if ($lid)
        {
            $condition['langid'] = $lid;
        }
        return $this->where($condition)->order('sort')->select();
    }

    public function selByPid($id)
    {
        $condition = array();
        $condition['pid'] = $id;
        $result = $this->where($condition)->select();
        return $result;
    }

    public function update($id, $data)
    {
        $conition = array();
        $conition['id'] = $id;
        $result = $this->where($conition)->save($data);
        if ($result !== false)
        {
            return true;
        }
        return false;
    }

    public function deletebyid($id)
    {
        $conition = array();
        $conition['id'] = $id;
        $b = $this->where($conition)->delete();
        if ($b !== false)
        {
            return true;
        }
        return false;
    }

    public function selectbyname($title)
    {
        $condition = array();
        $condition['title'] = $title;
        return $this->where($condition)->find();
    }

    public function selectByShow($menushow = -1)
    {
        $condition = array();
        if ($menushow != -1)
        {
            $condition['menushow'] = $menushow;
        }
        return $this->where($condition)->select();
    }

    public function findbyid($id)
    {
        return $this->find($id);
    }

}
