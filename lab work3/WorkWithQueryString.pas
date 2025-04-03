PROGRAM WorkWithQueryString(INPUT, OUTPUT);
USES
  DOS;
FUNCTION GetQueryStringParameter(Key: STRING): STRING;
VAR
  Str, TempStr: STRING;
  StartPos, EndPos: INTEGER;
BEGIN
  Str := GetEnv('QUERY_STRING');
  TempStr := '';
  StartPos := POS(Key + '=', Str);
  IF StartPos <> 0 
  THEN
    BEGIN
      TempStr := Copy(Str, StartPos + Length(Key) + 1, Length(Str));
      EndPos := POS('&', TempStr);
      IF EndPos = 0 
      THEN
        EndPos := Length(TempStr) + 1;
      TempStr := Copy(TempStr, 1, EndPos - 1)
    END;
  GetQueryStringParameter := TempStr
END;

BEGIN {WorkWithQueryString}
  WRITELN('Content-Type: text/plain');
  WRITELN;
  WRITELN('First Name: ', GetQueryStringParameter('first_name'));
  WRITELN('Last Name: ', GetQueryStringParameter('last_name'));
  WRITELN('Age: ', GetQueryStringParameter('age'))
END. {WorkWithQueryString}