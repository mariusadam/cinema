<?php

namespace Controller;

use Framework\Helper\MainControllerHelper as Helper;

class MainController extends AbstractController
{
    /**
     * Renders previously retrieved movie data or gets new data.
     *
     * @return html
     */
    public function showMovies()
    {
        $context = $this->session->get('movie_data');
        $page = $this->getQueryParam('page');

        // if there is no session data or nobody tried to go to a different page, show existing data
        if (is_null($context) || !is_null($page) || !empty($page)) {
            return $this->loadFilteredMovies();
        } else {
            $html = $this->render('index', array('context' => $context));
            $this->session->set('movie_data', null);
            return $html;
        }
    }

    /**
     * Returns conditions for the repository query.
     *
     * @return array|null
     */
    private function getConditions()
    {
        // if we have post data, return those
        if ($this->request->isMethod('POST')) {
            $conditions = $this->getPostParam('conditions');
            $this->session->set('movie_query_conditions', $conditions);
            return $conditions;
        }

        // else try getting them from session
        $lastForm = $this->session->get('movie_query_conditions');
        if (!is_null($lastForm)) {
            return $lastForm;
        }

        // else, no data
        return null;
    }

    /**
     * Retrieves movies for displaying the main page.
     *
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|html
     */
    public function loadFilteredMovies($page = 1, $moviesPerPage = 100) // temporary params
    {
        $context = [
            'movieList' => '',
            'conditions' => ''
        ];

        // get the repository
        $movieRepository = $this->getRepository('movie');

        // get the conditions for the query, if any
        $conditions = $this->getConditions();

        // structure existing data for running the query
        $queryConditions = Helper::prepareQueryData($page, $moviesPerPage, $conditions);

        // get current movies
        try{
            $data = $movieRepository->loadCurrentMovieData($queryConditions);
            $context = [
                'movieList' => $data,
                'conditions' => $conditions
            ];

            // store the results for later use
            $this->session->set('movie_data', $context);

            // go to/show homepage
            if ($this->request->isMethod('POST')) {
                return $this->redirectRoute('homepage', $context);
            } else {
                return $this->render('index', $context);
            }
        } catch (Exception $ex) {
            $this->addErrorMessage('Something went wrong while trying to talk to the database.');
            return $this->render('users', $context);
        }
    }
}
