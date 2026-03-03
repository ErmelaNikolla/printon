<x-mail::message>
# Your order is complete! 🎉

Hi {{ $order->name !== 'Quick Inquiry' ? $order->name : 'there' }},

We're happy to let you know that your order with **PrintOn** has been completed.

@if($order->message)
> {{ $order->message }}
@endif

If you have any questions or need anything else, just reach out to us directly.

**PrintOn** · Rruga Kongresi Manastirit, Tiranë
📞 069 369 9603

<x-mail::button :url="'https://wa.me/355693699603'" color="success">
Chat on WhatsApp
</x-mail::button>

Thanks for choosing PrintOn!<br>
The PrintOn Team
</x-mail::message>
