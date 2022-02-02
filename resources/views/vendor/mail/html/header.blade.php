<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Leptons')
<img src="https://leptonsmulticoncept.com/wp-content/uploads/fbrfg/apple-touch-icon.png" class="logo" alt="">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
