$lines = Get-Content -Path 'c:\wamp64\www\Himalayanmonk\ingredients.php'
$newlines = $lines[0..17] + $lines[143..($lines.Count-1)]
$newlines | Set-Content -Path 'c:\wamp64\www\Himalayanmonk\ingredients.php'
