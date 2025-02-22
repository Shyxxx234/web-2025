PROGRAM Hello(INPUT, OUTPUT);
USES
  DOS;
VAR
  Name: STRING;
BEGIN
  WRITELN('Content-Type: text/plain');
  WRITELN;
  Name := GetEnv('QUERY_STRING');
  IF POS('name=', Name) <> 0
  THEN
    BEGIN
      DELETE(Name, 1, 5);
      WRITELN('Hello dear, ', Name, '!')
    END
  ELSE
    WRITELN('Hello Anonymous!')
END. 

{http://localhost/cgi-bin/hello.cgi?name=Max}