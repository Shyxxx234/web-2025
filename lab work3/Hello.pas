PROGRAM Hello(INPUT, OUTPUT);
USES
  DOS;
VAR
  Name, Str: STRING;
BEGIN
  Name := '';
  WRITELN('Content-Type: text/plain');
  WRITELN;
  Str := '&' + GetEnv('QUERY_STRING') + '&';
  IF (POS('&name=', Str) <> 0)
  THEN
    BEGIN 
      DELETE(Str, 1, POS('name=', Str));
      DELETE(Str, 1, POS('=', Str));
      Name := Copy(Str, 1, POS('&', Str) - 1);
    END;                          
  IF Name = ''
  THEN
    WRITELN('Hello Anonymous!')    
  ELSE
    WRITELN('Hello dear, ', Name, '!')
END. 

{http://localhost/cgi-bin/hello.cgi?name=Max}