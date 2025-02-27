PROGRAM Hello(INPUT, OUTPUT);
USES
  DOS;
VAR
  Name, Str: STRING;
BEGIN
  WRITELN('Content-Type: text/plain');
  WRITELN;
  Str := GetEnv('QUERY_STRING'); 
  DELETE(Str, 1, POS('name=', Str));
  DELETE(Str, 1, POS('=', Str));
  Name := Copy(Str, 1, POS(',', Str) - 1);
  IF Name = ''
  THEN
    WRITELN('Hello Anonymous!')    
  ELSE
    WRITELN('Hello dear, ', Name, '!')
END. 

{http://localhost/cgi-bin/hello.cgi?name=Max}