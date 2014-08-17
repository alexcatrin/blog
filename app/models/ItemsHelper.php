<?php

class ItemsHelper {

    private $items;

    public function __construct($items) {
        $this->items = $items;

    }

    public function htmlList() {
        return $this->htmlFromArray($this->itemArray());
    }

    private function category_id($name){
        $result='';
        foreach($this->items as $item){
            if($item->name == $name ){
                $result = $item->id;
            }
        }
        return $result;
    }
    private function itemArray() {
        $result = array();
        foreach($this->items as $item) {
            if ($item->parent_id == 0) {
                $result[$item->name] = $this->itemWithChildren($item);
            }
        }


        return $result;
    }

    private function childrenOf($item) {
        $result = array();
        foreach($this->items as $i) {
            if ($i->parent_id == $item->id) {
                $result[] = $i;
            }
        }
        return $result;
    }

    private function itemWithChildren($item) {
        $result = array();
        $children = $this->childrenOf($item);
        foreach ($children as $child) {
            $result[$child->name] = $this->itemWithChildren($child);
        }

        return $result;
    }

    private function htmlFromArray($array) {

        $html = '<ol class=dd-list >';
        foreach($array as $k=>$v) {
            $html .= "<li class=dd-item data-id=".$this->category_id($k).">
                            <div class=dd-handle>
                                ".$k."
                                <div class=pull-right>
                                    <a class='btn btn-info btn-xs' href='category/add/".$this->category_id($k)."' >Add Subcategory</a>
                                    <a class='btn btn-success btn-xs' href='category/update/".$this->category_id($k)."' >Edit Category</a>
                                    <a href='category/delete/".$this->category_id($k)."' class='btn btn-danger btn-xs' onClick=\"return confirm ('Are you sure you want to delete category ".$k."?')\" >Delete</a>

                </div>

                            </div>";
            if(count($v) > 0) {
                    $html .= $this->htmlFromArray($v);
            }
            $html.="</li>";
        }
        $html .= "</ol>";

        return $html;
    }
}
