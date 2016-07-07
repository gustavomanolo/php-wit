<?php
	namespace Gustavomanolo\WitPhp;
	use GuzzleHttp\Client as GuzzleClient;
    use GuzzleHttp\RequestOptions;

	class Wit{

		/**
		 * API base URI
		 */
		const API_BASE_URI = 'https://api.wit.ai/';

		/*
         * API Version
         */
		const API_VERSION = '20160526';

        /**
         * Default connection timeout
         */
        const CONNECTION_TIMEOUT = 5;

        /**
         * @var string Wit.ai app token (found under Settings in the Wit console)
         */
        private $accessToken;

        /**
         * @var string Wit.ai API version
         */
        private $apiVersion;

		/**
		 * @var object (instance of GuzzleHttp\Client => http://docs.guzzlephp.org/en/latest/ )
		 */
        private $guzzleClient;

        /**
         * Wit constructor.
         * @param $accessToken
         * @param $apiVersion
         */
        public function __construct($accessToken, $apiVersion = self::API_VERSION)
		{
			$this->accessToken = $accessToken;
			$this->apiVersion = $apiVersion;
			$this->guzzleClient = new GuzzleClient([
                'base_uri' => self::API_BASE_URI,
                'timeout' => self::CONNECTION_TIMEOUT
            ]);
		}


		public function message($message, $extraParams=[])
		{
            $query = [
                'q' => $message
            ];

            //-> Remove key "q" if exist in $extraParams
            if( array_key_exists('q', $extraParams) )
            {
                unset( $extraParams['q'] );
            }

            //-> Merge array for GET parameters
            $queryParams = array_merge($query, $extraParams);

            $options =  [
                RequestOptions::QUERY => $queryParams,
                RequestOptions::HEADERS => [
                    'Authorization' => 'Bearer '.$this->accessToken,
                ]
            ];
            $response = $this->guzzleClient->request('GET', 'message', $options);


            // Get the decoded body
            return json_decode((string) $response->getBody(), true);

            //$body = $response->getBody();
            //echo $body;
		}



		/**
		 * @return string
         */
		public static function world()
		{
			return 'Hello World, Composer!';
		}

	}