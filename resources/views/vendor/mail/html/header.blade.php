<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
<img src="{{ asset('img/mail-logo.png')}}" class="logo" alt="Noah's Ark Logo">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
