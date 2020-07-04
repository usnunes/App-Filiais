unit uDM;

interface

uses
  System.SysUtils, System.Classes, REST.Types,
  REST.Client, Data.Bind.Components,
  Data.Bind.ObjectScope;

type
  TDM = class(TDataModule)
    RESTClient1: TRESTClient;
    RESTRequest1: TRESTRequest;
    RESTResponse1: TRESTResponse;
  private
    { Private declarations }
  public
    { Public declarations }
  end;

var
  DM: TDM;
  BASE_URL: string = 'http://192.168.100.5/AppFilial/public/api';

implementation

{%CLASSGROUP 'FMX.Controls.TControl'}

{$R *.dfm}

end.
