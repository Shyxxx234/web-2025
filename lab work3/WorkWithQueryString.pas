PROGRAM WorkWithQueryString(INPUT, OUTPUT);
USES
  DOS;
FUNCTION GetQueryStringParameter(Key: STRING): STRING;
VAR
  Str: STRING;
BEGIN
  Str := GetEnv('QUERY_STRING') + '&'; 
  IF POS(Key + '=', Str) <> 0
  THEN
    BEGIN
      DELETE(Str, 1, POS(Key + '=', Str));
      DELETE(Str, 1, POS('=', Str));
      GetQueryStringParameter := Copy(Str, 1, POS('&', Str) - 1)
    END
  ELSE
    GetQueryStringParameter := ''
END;
BEGIN {WorkWithQueryString}
  WRITELN('Content-Type: text/plain');
  WRITELN;
  WRITELN('First Name: ', GetQueryStringParameter('first_name'));
  WRITELN('Last Name: ', GetQueryStringParameter('last_name'));
  WRITELN('Age: ', GetQueryStringParameter('age'))
END. {WorkWithQueryString}