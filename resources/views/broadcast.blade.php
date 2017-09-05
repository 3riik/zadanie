@extends('layout')


@section('broadcast')
<h3>Broadcast</h3>

<script type="text/javascript">
	ready: function() {

		self = this;

		this.pusher = new Pusher('3e3db88f7ac25cf01317');
		this.pusherChannel = this.pusher.subscribe('info-channel');

		this.pusherChannel.bind('UserRegistered', function(message) {

			self.users.push(message.user);
		})
	}
</script>