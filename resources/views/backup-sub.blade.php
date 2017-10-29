@extends('layouts.app')


@section('post-js')

<div class="container">
	<h2>Subscribe</h2>
	<div class="col-md-6">
		
	<form action="/subscribe" method="POST">
		{{csrf_field()}}
			<div class="form-group">
					<select name="plan" id="inputPlan" class="form-control" required="required">
						<option value="monthly">Monthly Plan</option>
						<option value="yearly">Yearly Plan</option>
					</select>

			</div>
	
		  <script
		    src="https://checkout.stripe.com/checkout.js" class="stripe-button"
		    data-key="pk_test_GryUHqXe48kgNc75J2BovmeN"
		    data-amount="999"
		    data-name="Webcasts"
		    data-description="Subscription for webcasts"
		    data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
		    data-locale="auto"
			data-label="Subscribe"
			data-email="{{auth()->check()?auth()->user()->email:null}}"
			data-panel-label="Subscribe"

		    >
		  </script>
	</form>
	</div>
</div>

@endsection

