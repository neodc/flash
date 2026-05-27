<?php

namespace Tests;

use Illuminate\Support\Facades\Session;
use Mdupaul\Flash\FlashNotifier;
use Mdupaul\Flash\SessionStore;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

class FlashTest extends TestCase {

    protected $session;

    protected $flash;

	public function setUp():void
	{
        $this->session = $this->createMock(SessionStore::class);
        $this->flash = new FlashNotifier($this->session);
	}

	#[Test]
	public function it_displays_default_flash_notifications()
	{
        Session::shouldReceive('has')->once()->andReturn(false);
        $this->session->expects($this->once())->method('flash')->with('flash_notification.messages', [['info' => 'Welcome Aboard']]);

        $this->flash->message('Welcome Aboard');
	}

	#[Test]
    public function it_displays_info_flash_notifications()
    {
        Session::shouldReceive('has')->once()->andReturn(false);
        $this->session->expects($this->once())->method('flash')->with('flash_notification.messages', [['info' => 'Welcome Aboard']]);

        $this->flash->info('Welcome Aboard');
    }

	#[Test]
	public function it_displays_success_flash_notifications()
	{
        Session::shouldReceive('has')->once()->andReturn(false);
        $this->session->expects($this->once())->method('flash')->with('flash_notification.messages', [['success' => 'Welcome Aboard']]);

		$this->flash->success('Welcome Aboard');
	}

	#[Test]
	public function it_displays_error_flash_notifications()
	{
        Session::shouldReceive('has')->once()->andReturn(false);
        $this->session->expects($this->once())->method('flash')->with('flash_notification.messages', [['danger' => 'Uh Oh']]);

        $this->flash->error('Uh Oh');
	}

	#[Test]
    public function it_displays_warning_flash_notifications()
    {
        Session::shouldReceive('has')->once()->andReturn(false);
        $this->session->expects($this->once())->method('flash')->with('flash_notification.messages', [['warning' => 'Be careful!']]);

        $this->flash->warning('Be careful!');
    }

	#[Test]
	public function it_displays_flash_overlay_notifications()
	{
        Session::shouldReceive('has')->times(3)->andReturn(false);

        $this->session->expects($this->exactly(3))->method('flash');

        $this->flash->overlay('Overlay Message');
	}

}
