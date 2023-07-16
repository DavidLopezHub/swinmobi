// SPDX-License-Identifier: MIT
pragma solidity ^0.8.6;

contract PropertiesContract {
    // tipos de datos
    // uint id, string oldOwner, string newOwner, string price, bool validity, string services, uint256 superficie,
    // uint256 createAt, string latitud, string longitud, uint256 startDate, uint256 endDate, uint adultOccupants,
    // uint minorOccupants, string roomNumber, bool lockStatus, string tipoInmueble, string zona

    uint256 public contador = 0;

    struct Property {
        //general
        uint256 id;
        string oldOwnerAndCedula; //nombre del antiguo propietario
        string newOwnerAndCedula; //nombre del nuevo propietario
        string price; //monto establecido
        uint propertyId; //estado del contrato
        string services; //servicios que tiene el inmueble
        uint256 superficie; //
        uint256 createAt; //fecha del contrato
        // uint256 cedulaOldOwner;
        // uint256 cedulaNewOwner;
        //datos del inmueble
        //propiedad
        string latitud;
        string longitud;
        //alquileres
        // uint256 startDate; //inicio del alquiler
        // uint256 endDate; //fin del contrato de alquiler
        // uint256 adultOccupants; //ocupantes adultos
        // uint256 minorOccupants; //ocupantes menores
        // string roomNumber; //numero de la habitacion
        // bool lockStatus;//estado de la cerradura
        //tipo inmueble
        // string tipoInmueble;
        //zona
        string zona;
    }
    event PropertyCreated(
        uint256 id,
        string oldOwnerAndCedula,
        string newOwnerAndCedula,
        string price,
        uint propertyId,
        string services,
        uint256 superficie,
        uint256 createAt,

        string latitud,
        string longitud,

        string zona
    );

    // event PropertyValidity(
    //     uint256 id,
    //     bool validity
    // );
    //acundo
    mapping(address => mapping(uint=>Property)) public properties;
    mapping(address=>uint) public propertiesCount;

    function createPropertyContract(
        string memory _oldOwnerAndCedula,
        string memory _newOwnerAndCedula,
        string memory _price,
        uint _propertyId,
        string memory _services,
        uint256 _superficie,
        string memory _latitud,
        string memory _longitud,
        string memory _zona
    ) public {
        uint propertyCount = propertiesCount[msg.sender];
        properties[msg.sender][propertyCount] = Property(
            propertyCount,
            _oldOwnerAndCedula,
            _newOwnerAndCedula,
            _price,
            _propertyId,
            _services,
            _superficie,
            block.timestamp,
            _latitud,
            _longitud,
            _zona
        );
        emit PropertyCreated(propertyCount, _oldOwnerAndCedula, _newOwnerAndCedula, _price, _propertyId, _services, _superficie, block.timestamp, _latitud, _longitud, _zona);
        propertiesCount[msg.sender]++;
        contador++;
    }

    // function cambiarEstado(uint _id) public {
    //     Property memory _property= properties[msg.sender][_id];
    //     _property.validity= !_property.validity;
    //     properties[msg.sender][_id]=_property;
    //     emit PropertyValidity(_id, _property.validity);
    // }
}
