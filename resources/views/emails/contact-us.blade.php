<p><h3>{{ $title }}</h3></p>

<p><b>Kebutuhan</b> : {{ $category }}</p>

<p>
  {!! nl2br($content_short) !!}
</p>
<br>

---
<p>
  Data Pengirim : 
  <ul>
    <li><b>Nama </b>: {{ $name }}</li>
    <li><b>Email </b>: {{ $email }}</li>
  </ul>  
</p>