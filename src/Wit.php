<?php
	namespace Gustavomanolo\WitPhp;

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
         * @var string Wit.ai app token (found under Settings in the Wit console)
         */
        private $accessToken;

        /**
         * @var string Wit.ai API version
         */
        private $apiVersion;

        /**
         * Wit constructor.
         * @param $accessToken
         * @param $apiVersion
         */
        public function __construct($accessToken, $apiVersion = self::DEFAULT_API_VERSION)
		{
			$this->accessToken = $accessToken;
			$this->apiVersion = $apiVersion;
		}


		/**
		 * @return string
         */
		public static function world()
		{
			return 'Hello World, Composer!';
		}

	}