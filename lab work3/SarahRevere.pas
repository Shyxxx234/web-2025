PROGRAM SarahRevere(INPUT, OUTPUT);
USES
  DOS;
VAR
  Lanterns: STRING;
BEGIN
  WRITELN('Content-Type: text/plain');
  WRITELN;
  Lanterns := GetEnv('QUERY_STRING'); 
  IF Lanterns = 'lanterns=1'
  THEN
    WRITELN('The British are coming by land');
  IF Lanterns = 'lanterns=2'
  THEN
    WRITELN('The British are coming by sea');
  IF (Lanterns <> 'lanterns=1') AND (Lanterns <> 'lanterns=2')
  THEN
    WRITELN('The Britist arent coming')
END.
  
