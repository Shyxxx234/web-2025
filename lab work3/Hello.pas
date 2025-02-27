PROGRAM Hello(INPUT, OUTPUT);
USES
  DOS;
VAR
  FirstName, Str: STRING;
BEGIN
  WRITELN('Content-Type: text/plain');
  WRITELN;
  Str := GetEnv('QUERY_STRING'); 
  DELETE(Str, 1, POS('name=', Str));
  DELETE(Str, 1, POS('=', Str));
  FirstName := Copy(Str, 1, POS(',', Str) - 1);
  IF FirstName = ''
  THEN
    WRITELN('Hello Anonymous!')    
  ELSE
    WRITELN('Hello dear, ', FirstName, '!')
END. 

{http://localhost/cgi-bin/hello.cgi?name=Max}