<!-- @TODO: replace SET_YOUR_CLIENT_KEY_HERE with your client key -->
<script type="text/javascript"
    src="{{ env('MIDTRANS_IS_PRODUCTION', false) ? 'https://app.midtrans.com/snap/snap.js' : 'https://app.sandbox.midtrans.com/snap/snap.js' }}"
    data-client-key="{{ env('MIDTRANS_CLIENT_KEY') }}"></script>
<!-- Note: replace with src="https://app.midtrans.com/snap/snap.js" for Production environment -->
