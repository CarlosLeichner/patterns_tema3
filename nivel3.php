<?php
/*Piensa en la siguiente función simple con el nombre couponGenerator que genera diferentes cupones para distintos tipos de automóviles. 
Para aquellos que están interesados ​​en comprar un BMW ofrece un cupón distinto al de aquellos que estén interesados ​​en comprar un Mercedes.

El cupón tiene en cuenta los siguientes factores para ponderar la tasa de descuento:

Es posible que deseemos ofrecer un descuento durante una recesión en la compra de automóviles. En nuestro código se le denomina a este atributo 
como isHighSeason.
Es posible que deseemos ofrecer un descuento cuando el stock de automóviles a la venta sea demasiado grande. En nuestro código se le denomina a 
ese atributo como bigStock.
Según las consideraciones anteriores necesitamos utilizar el patrón strategy para que dada la marca de un automóvil, nuestro programa calcule 
el descuento.

Asegúrate de tener en cuenta lo siguiente:
function cupounGenerator($car) {

    $discount = 0;
    $isHighSeason = false;
    $bigStock = true;

    if($car == "bmw"){
        if(!$isHighSeason) {$discount += 5;}
       if($bigStock) {$discount += 7;}
    } else if($car == "mercedes") {
       if(!$isHighSeason) {$discount += 4;}
       if($bigStock) {$discount += 10;}
    
    }
    return $cupoun = "Get {$discount}% off the price of your new car.";
}
echo cupounGenerator("bmw");
Es necesario crear una función llamada addSeasonDiscount que añade un descuento cuando las ventas bajan.
Es necesario crear una función llamada addStockDiscount que añade un descuento cuando el inventario es demasiado grande.
Dado que los cupones varían según cada tipo de automóvil, lo ideal sería convocar estas funciones en clases separadas. Por lo que será necesario
 implementar las clases bmwCuoponGenerator y mercedesCuoponGenerator.

De hecho, como los métodos anteriores para cada cupón tienen el mismo nombre; es necesario crear la interfaz carCouponGenerator que obligue a 
todas las clases que la implementen a usarlos, incluidas las que acabamos de escribir y las que nos gustaría añadir en el futuro.

Imprime por pantalla el resultado del cupón para ambas marcas de coche (BMW y Mercedes).*/



interface carCouponGenerator
{
    public function addSeasonDiscount(); 
    public function addStockDiscount();
}

class bmwCuoponGenerator implements carCouponGenerator
{
    private $discount;
    function addSeasonDiscount()
    {// ($isHighSeason) {$discount += 5;} bmw 
        
        return $this->discount += 5;
    }
    
    function addStockDiscount()
    {// ($bigStock) {$discount += 7;} bmw 
        return $this->discount += 7;
    }
}
class mercedesCuoponGenerator implements carCouponGenerator
{
    private $discount;
    
    function addSeasonDiscount()
    {// (!$isHighSeason) {$discount += 4;} mercedes
        
        return $this->discount +=4;
    }
    
    function addStockDiscount()
    {// ($bigStock) {$discount += 10;} mercedes
        return $this->discount +=10;
    }
}
 

$mercedes = new mercedesCuoponGenerator();
$bmw = new bmwCuoponGenerator();
var_dump($bmw->addSeasonDiscount()) ;

var_dump($mercedes->addStockDiscount()) ;

?>