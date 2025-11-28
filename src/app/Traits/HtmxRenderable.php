<?php

namespace App\Traits;

use App\Middlewares\CsrfToken;
use Exception;

trait HtmxRenderable
{
	protected string $view;

	protected array $data = [];

	protected function render()
	{
		// add csrf_token
		$this->setCsrfToken();

		// add $view to data
		$this->setView();

		$isHtmx = isset($_SERVER['HTTP_HX_REQUEST']);

		if ($isHtmx) {
			return $this->blade->run("pages.{$this->view}", $this->data);
		}

		return $this->blade->run('page', $this->data);
	}

	protected function setView()
	{
		$this->data['view'] = $this->view;
	}

	protected function setCsrfToken()
	{
		$this->data['csrf_token'] = CsrfToken::getCsrfToken();
	}

	protected function log(string $msg, array $context = [])
	{
		try {
			error_log($msg . "\n" . json_encode($context) . "\n", 3, __DIR__ . '/../../../error.log');
		} catch (Exception $ex) {
			echo $ex->getMessage();
		}
	}
}
