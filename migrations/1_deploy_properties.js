const PropertiesContract = artifacts.require("PropertiesContract");

module.exports = function (deployer) {
  deployer.deploy(PropertiesContract);
};
