<?php

class Router{
    private $get = [];
    private $post =[];

  /**
   * The function creates and returns a new instance of the router class.
   * 
   * @return An instance of the class that contains this method.
   */
    public static function make(){
        $router = new self;
        return $router;
    }

   /**
    * This function adds a GET route to a PHP router.
    * 
    * @param uri The URI (Uniform Resource Identifier) is the path that the user will enter in the
    * browser to access a specific page or resource on the website. For example, "/about" or
    * "/contact-us".
    * @param action The action parameter is a callback function or a method that will be executed when
    * the specified URI is requested using the HTTP GET method. It can be a closure or a reference to a
    * method of a class.
    * 
    * @return The instance of the class is being returned to allow for method chaining.
    */
    public function get($uri,$action){
        $this->get[$uri] = $action;
        return $this;
    }

   /**
    * This function adds a new URI and its corresponding action to the list of available POST requests.
    * 
    * @param uri The URI (Uniform Resource Identifier) is a string of characters that identifies a name
    * or a resource on the internet. In this context, it is the endpoint or URL that the user will
    * access to perform a specific action on the server. For example, "/users" could be the URI for a
    * resource
    * @param action The action parameter is a callback function or a string representing the action to
    * be taken when the specified URI is accessed using the HTTP POST method. It can be a closure, a
    * controller method, or a function that handles the request and returns a response.
    * 
    * @return The `post()` method returns the current instance of the class (``) after adding the
    * specified `` and `` to the `` array.
    */
    public function post($uri, $action){
        $this->post[$uri] = $action;
        return $this;
    }

   /* The `resolve` method takes in a URI and a HTTP method (either "get" or "post") and checks if the
   URI exists in the corresponding array of routes for that method. If it does, it requires the file
   associated with that route. If it doesn't exist, it throws a 404 exception. This method is used
   to match incoming requests to the appropriate route and execute the corresponding code. */
    public function resolve($uri,$method){
        if(array_key_exists($uri,$this->{$method})){
            require $this->{$method}[$uri];
        }else{
            throw new Exception('404');
        }
    }

}