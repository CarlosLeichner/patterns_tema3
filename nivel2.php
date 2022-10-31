<?php
/*El siguiente problema fue adaptado de [FREEMAN] págs. 238-240.

Supone que tienes las siguientes dos clases de PHP.
¿Quieres que sus pavos se comporten como patos, por lo que tienes que aplicar el adaptador pattern. En el mismo archivo, escribe una clase 
llamada TurkeyAdapter y asegúrate de que tenga en cuenta lo siguiente:

La traducción del quack entre clases es fácil: simplemente llama al método Gobble cuando sea apropiado.

Aunque ambas clases tienen un método fly, los pavos sólo pueden volar a rachas cortas, no pueden volar largas distancias como los patos. 
Para mapear entre el método fly de un pato y el método del pavo, debe llamarse al método fly del pavo cinco veces para compensarlo.

Prueba tu clase con el siguiente código:*/

class Duck {

    public function quack() {
           echo "Quack \n";
    }

    public function fly() {
           echo "I'm flying \n";
    }
}
class Turkey  {

    public function gobble() {
           echo "Gobble gobble \n"."</br>";
    }

    public function fly() {
    echo "I'm flying a short distance \n"."</br>";
    }
}
    function duck_interaction($duck) {
        $duck->quack();
        $duck->fly();
        
}
    function turkey_interaction($turkey) {
        $turkey->gobble();
        $turkey->fly();
}

class TurkeyAdapter extends Turkey{
    private $Turkey;
    function __construct(Turkey $Turkey)
    {
        $this->Turkey= $Turkey;
    }
    public function quack(){
            parent::gobble()."</br>";
    }
    public function fly(){
        for ($i=1; $i <=5 ; $i++) { 
            parent::fly();
        }
    }
   
}
$duck = new Duck;
$turkey = new Turkey;
$turkey_adapter = new TurkeyAdapter($turkey);
echo "The Turkey says...\n"."</br>";
$turkey->gobble()."</br>";
$turkey->fly()."</br>";
echo "The Duck says...\n"."</br>";
duck_interaction($duck)."</br>";
echo "The TurkeyAdapter says...\n"."</br>";
duck_interaction($turkey_adapter)."</br>";

/*Output
The expected output is as follows:
The Turkey says...
Gobble gobble
I'm flying a short distance
The Duck says...
Quack
I'm flying
The TurkeyAdapter says...
Gobble gobble
I'm flying a short distance
I'm flying a short distance
I'm flying a short distance
I'm flying a short distance
I'm flying a short distance*/
