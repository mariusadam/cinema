<?php

namespace Repository;

class MovieRepository extends AbstractRepository
{

    /**
     * creates \Entity\Movie object from properties array
     * 
     * @param array $properties
     * @return \Entity\Movie
     */
    protected function loadEntityFromArray(array $properties) {
        
        //validate dis shit
        
        return new \Entity\Movie($properties);
    }
    
}