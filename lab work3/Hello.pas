PROGRAM Hello(INPUT, OUTPUT);
USES
  DOS;
VAR
  Name: STRING;
BEGIN
  WRITELN('Content-Type: text/plain');
  WRITELN;
  Name := GetEnv('QUERY_STRING'); 
  DELETE(Name, 1, POS('name=', Name));
  DELETE(Name, 1, POS('=', Name));
  IF Name = ''
  THEN
    WRITELN('Hello Anonymous!')    
  ELSE
    WRITELN('Hello dear, ', Name, '!')
END. 

{http://localhost/cgi-bin/hello.cgi?name=Max}