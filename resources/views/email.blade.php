<div class="bg-gray-100 p-6">
    @php
        $user = \Illuminate\Support\Facades\Auth::user();
        $fullname = ucfirst( $user->first_name). ' ' .ucfirst($user->last_name);
    @endphp
    <h1 class="text-2xl font-bold mb-4">Payment Confirmation Email</h1>

    <p>Dear {{$fullname}},</p>

    <p>Thank you for your payment. This email confirms that we have received your payment for Prospect.</p>

    <p>Here are the details of your purchase:</p>

    <ul>
        <li>Product: Prospect Premium Subscription (Plan Name)</li>
        <li>Payment Method: [Payment Method]</li>
        <li>Transaction ID: [Transaction ID]</li>
        <li>Transaction Date: [Transaction Date]</li>
        <li>Amount Paid: [Amount Paid]</li>
    </ul>

    <p>We've attached your invoice to this email for your records. If you have any questions regarding your purchase, please feel free to contact us at [Customer Support Email].</p>

    <p>Thank you for choosing Prospect. We are excited to continue providing you with exceptional service.</p>

    <p>Best,<br>The Prospect</p>

    <hr>

    <h2 class="text-xl font-bold mb-2">Invoice</h2>

    <p>INVOICE</p>

    <p>Prospect<br>
    [Your Company's Address]<br>
    [Your Company's Contact Information]</p>

    <p>Invoice To:<br>
    {{$fullname}}<br>
    {{$user->email}}</p>

</div>
