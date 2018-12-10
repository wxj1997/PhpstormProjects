<?php
class a{
    protected $c;
    public function a(){
        $this->c=10;
    }
}
class b extends a{
    public function print_data(){
        return $this->c;
    }
}
$b=new b();
echo $b->print_data();
?>