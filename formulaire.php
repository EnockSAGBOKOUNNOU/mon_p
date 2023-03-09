<?php

class Form{
    private $posts;
    public function __construct()
    {
       $this->posts= $_POST;
    }
    private function getValue($name)
    {
       // var_dump($this->posts); //retrouver les valeur eentrez dans le formulaire sous forme de tableau
        return $this->posts[$name] ?? null;
   
    }
    public function create($name, array $opton = []){
        /*$method = isset($opion['method']) ? $option['method'] : 'post';
        */
        $method = $option['method'] ?? 'post';//si la méthode n'existe pas la méthode par défaut est post
        return '<form method ="'.$method .'" name="'.$name.'" id="form-'.ucfirst($name).'">';
    }
    //une methode qui va nous crée des champs avec leur label
    public function input($name, $texte, array $opton = [])
    {
      $html = $this-> label($name, $texte);
      $type = $option['type'] ?? 'text';//si la méthode n'existe pas la méthode par défaut est post
      $html .= '<p><input type="'.$type.'" name="'.$name.'"  placeholder="'.$texte.'" class="form-control" id="'.$name.'" value="'.$this->getValue($name).'"> </p>';
   return $html ;
    }
    public function label($for, $texte){
     return '<label for="'.$for.'">'.$texte.'</label>';
    }
    public function end($texte)
    {
        return '<button type="submit" class="btn bnt-primary">'.$texte.'</button>
        </form>';
    }
}



$form = new Form($_POST);
echo $form ->create('myform'/*, ['method'=>'get']*/);
echo $form->input('prenom', 'Ton prénom');
echo $form->input('email', 'Ton email');
echo $form->end('Envoyer');
?>