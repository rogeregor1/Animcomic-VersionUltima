<?php
include_once '../../controladores/session.php';

class Carrito extends Session{

    function __construct(){
        parent::__construct('carrito');
    }

    public function load(){
        if($this->getValueSession() == NULL){
            return '[]';
        }
        return $this->getValueSession();
    }

    public function add($id){
        if($this->getValueSession() == NULL){
            $items = [];
        }else{
            $items = json_decode($this->getValueSession(), 1);
            for($i=0; $i<sizeof($items); $i++){
                if($items[$i]['id'] == $id){
                    $items[$i]['cantidad']++;
                    $this->setValueSession(json_encode($items));
                    return $this->getValueSession();
                }
            }
        }
        
        $item = ['id' => (int)$id, 'cantidad' => 1];
        
        array_push($items, $item);
        $this->setValueSession(json_encode($items));
        return $this->getValueSession();
    }

    public function remove($id){
        if($this->getValueSession() == NULL){
            $items = [];
        }else{
            $items = json_decode($this->getValueSession(), 1);

            for($i=0; $i<sizeof($items); $i++){
                
                if($items[$i]['id'] == $id){
                    $items[$i]['cantidad']--;
                    if($items[$i]['cantidad'] == 0){
                        unset($items[$i]);
                        $items = array_values($items);
                    }
                    $this->setValueSession(json_encode($items));
                    return true;
                }
            }
        }
        
        //$item = ['id' => (int)$id, 'cantidad' => 1];
        
        //array_push($items, $item);
        //$this->setValue(json_encode($items));
        //return $this->getValue();
    }

}
?>